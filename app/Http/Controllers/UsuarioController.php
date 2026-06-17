<?php

namespace App\Http\Controllers;

use App\Models\User; // Cambiado de Usuario a User
use App\Models\Rol;   // Asegúrate de importar Rol
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index() {
        // Ahora usamos el modelo User
        $usuarios = User::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email', // apunto a la tabla usuarios
            'password' => 'required|min:8|confirmed',
            'rol_id' => 'required|exists:roles,id',
        ]);

        // Usamos User en lugar de Usuario
        User::create($request->only(['nombre', 'email', 'password', 'rol_id']));

        return redirect()->route('usuarios.index')->with('exito', 'Usuario registrado.');
    }

    public function destroy(User $usuario) { // Cambiado el tipo de parámetro a User
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('exito', 'Usuario dado de baja.');
    }
}
