<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request) 
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'Abizena'       => 'required|string|max:100',
            'Mota'          => 'required|in:Admin,Arrunta',
            'email'         => 'required|email|max:150|unique:users,email',
            'password'      => 'required|string|min:6',
            'id_sortzailea' => 'nullable|exists:users,id'
        ]);
        
        $data = $request->all();
        // Encriptamos la contraseña antes de guardarla
        $data['password'] = Hash::make($request->password);
        
        User::create($data);
        
        return redirect()->route('users.index')->with('success', 'Erabiltzailea ongi gehitu da!'); 
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'Abizena'       => 'required|string|max:100',
            'Mota'          => 'required|in:Admin,Arrunta',
            // Ignora el email del usuario actual para que no salte error de validación
            'email'         => 'required|email|max:150|unique:users,email,'.$id,
            'password'      => 'nullable|string|min:6',
            'id_sortzailea' => 'nullable|exists:users,id'
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();

        // Solo encriptamos y actualizamos la contraseña si el usuario ha escrito una nueva
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Erabiltzailea ongi eguneratu da!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Erabiltzailea ezabatu egin da!');
    }
}