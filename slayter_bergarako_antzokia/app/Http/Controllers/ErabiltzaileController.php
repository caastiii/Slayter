<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ErabiltzaileController extends Controller
{
    public function index()
    {
        $erabiltzaileak = User::all();
        return view('erabiltzaileak.index', compact('erabiltzaileak'));
    }

    public function create()
    {
        return view('erabiltzaileak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'Abizena' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'Mota' => ['required', 'in:Admin,Arrunta'],
        ]);

        User::create([
            'name' => $request->name,
            'Abizena' => $request->Abizena,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Mota' => $request->Mota,
            'id_sortzailea' => auth()->id(),
        ]);

        return redirect()->route('erabiltzaileak.index')->with('success', 'Erabiltzailea ongi sortu da.');
    }

    public function edit(User $user)
    {
        return view('erabiltzaileak.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'Abizena' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class.',email,'.$user->id],
            'Mota' => ['required', 'in:Admin,Arrunta'],
        ]);

        $user->update([
            'name' => $request->name,
            'Abizena' => $request->Abizena,
            'email' => $request->email,
            'Mota' => $request->Mota,
        ]);

        if ($request->filled('password')) {
            $request->validate(['password' => ['confirmed', Rules\Password::defaults()]]);
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('erabiltzaileak.index')->with('success', 'Erabiltzailea ongi eguneratu da.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('erabiltzaileak.index')->with('error', 'Ezin duzu zure burua ezabatu.');
        }

        $user->delete();
        return redirect()->route('erabiltzaileak.index')->with('success', 'Erabiltzailea ongi ezabatu da.');
    }
}