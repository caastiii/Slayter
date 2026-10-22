<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekitaldia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EkitaldiaController extends Controller
{
    public function index()
    {
        $ekitaldiak = Ekitaldia::all(); 

        // Apunta a resources/views/ekitaldiak/dashboard.blade.php
        return view('ekitaldiak.dashboard', compact('ekitaldiak'));
    }

    public function create()
    {
        // Apunta a resources/views/ekitaldiak/create.blade.php
        return view('ekitaldiak.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'izenburua'      => 'required|string|max:200',
            'deskripzioa'    => 'nullable|string',
            'ekitaldi_data'  => 'required|date',
            'ordua'          => 'required',
            'aforo'          => 'required|integer|min:1',
            'egoera'         => 'nullable|string|max:50',
            'prezio_sarrera' => 'required|numeric|min:0',
            'irudia'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['id_sortzailea'] = Auth::id();
        $data['aforo_librea'] = $request->aforo;

        if ($request->hasFile('irudia')) {
            $data['irudia'] = $request->file('irudia')->store('ekitaldiak', 'public');
        }

        Ekitaldia::create($data);

        return redirect()->route('ekitaldiak.index')->with('success', 'Ekitaldia ongi gehitu da!');
    }

    public function show($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        // Apunta a resources/views/ekitaldiak/show.blade.php
        return view('ekitaldiak.show', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function edit($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        // Apunta a resources/views/ekitaldiak/edit.blade.php
        return view('ekitaldiak.edit', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'izenburua'      => 'required|string|max:200',
            'deskripzioa'    => 'nullable|string',
            'ekitaldi_data'  => 'required|date',
            'ordua'          => 'required',
            'aforo'          => 'required|integer|min:1',
            'egoera'         => 'nullable|string|max:50',
            'prezio_sarrera' => 'required|numeric|min:0',
            'irudia'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ekitaldia = Ekitaldia::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('irudia')) {
            if ($ekitaldia->irudia) {
                Storage::disk('public')->delete($ekitaldia->irudia);
            }
            $data['irudia'] = $request->file('irudia')->store('ekitaldiak', 'public');
        }

        $ekitaldia->update($data);

        return redirect()->route('ekitaldiak.index')->with('success', 'Ekitaldia ongi eguneratu da!');
    }

    public function delete($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        if ($ekitaldia->irudia) {
            Storage::disk('public')->delete($ekitaldia->irudia);
        }

        $ekitaldia->delete();

        return redirect()->route('ekitaldiak.index')->with('success', 'Ekitaldia ezabatu da!');
    }
}