<?php

namespace App\Http\Controllers;

use App\Models\Ekitaldia;
use App\Models\Sarrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SarreraController extends Controller
{
    /**
     * Muestra el historial de entradas compradas por el usuario logueado.
     */
    public function index()
    {
        $sarrerak = Sarrera::with('ekitaldia')
            ->where('id_erabiltzaile', Auth::id())
            ->orderBy('data_erosketa', 'desc')
            ->get();

        return view('erosketak.index', compact('sarrerak'));
    }

    /**
     * Muestra la vista de confirmación de compra para un evento.
     */
    public function create($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        if ($ekitaldia->aforo_librea <= 0) {
            return back()->with('error', 'Ekitaldi honetarako sarrera guztiak agortuta daude.');
        }

        return view('erosketak.erosi', compact('ekitaldia'));
    }

    /**
     * Procesa la compra de entradas.
     */
    public function store(Request $request)
    {
        $ekitaldia = Ekitaldia::findOrFail($request->id_ekitaldia);

        $request->validate([
            'id_ekitaldia' => 'required|exists:ekitaldiak,id',
            'kantitatea'   => 'required|integer|min:1|max:' . $ekitaldia->aforo_librea,
        ]);

        try {
            DB::transaction(function () use ($request, $ekitaldia) {
                $ekitaldiaLock = Ekitaldia::lockForUpdate()->findOrFail($ekitaldia->id);

                if ($ekitaldiaLock->aforo_librea < $request->kantitatea) {
                    throw new \Exception('Ez dago hainbeste sarrera libre.');
                }

                // Registrar la compra
                Sarrera::create([
                    'data_erosketa'  => now(),
                    'kantitatea'      => $request->kantitatea,
                    'id_erabiltzaile' => Auth::id(),
                    'id_ekitaldia'    => $ekitaldiaLock->id,
                ]);

                // Descontar aforo
                $ekitaldiaLock->decrement('aforo_librea', $request->kantitatea);
            });

            return redirect()->route('erosketak.index')->with('success', 'Erosketa ondo burutu da!');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Cancela la compra y devuelve el aforo libre al evento.
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $sarrera = Sarrera::where('id', $id)
                    ->where('id_erabiltzaile', Auth::id())
                    ->firstOrFail();

                $ekitaldiaLock = Ekitaldia::lockForUpdate()->findOrFail($sarrera->id_ekitaldia);

                // Devolver aforo al evento
                $ekitaldiaLock->increment('aforo_librea', $sarrera->kantitatea);

                // Eliminar la entrada
                $sarrera->delete();
            });

            return redirect()->route('erosketak.index')->with('success', 'Sarrera ondo bertan behera utzi da eta aforoa liberatu da.');

        } catch (\Exception $e) {
            return back()->with('error', 'Ezin izan da sarrera ezeztatu.');
        }
    }
}