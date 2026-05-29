<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   // 3. Procesa el formulario de registro público (Crea Clientes)
    public function registrar(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buscamos específicamente el rol de Cliente que acabás de crear en DBeaver
        $rolCliente = \App\Models\Rol::where('nombre', 'Cliente')->first();

        // Por si las dudas no se encuentra el rol en la BD, usamos el ID 2 como respaldo
        $rolId = $rolCliente ? $rolCliente->id : 2;

        $usuario = new Usuario();
        $usuario->nombre = $request->name . ' ' . $request->lastname;
        $usuario->email = $request->email;
        $usuario->password = $request->password; 
        $usuario->rol_id = $rolId; // <-- Ahora cae como Cliente (ID 2)
        $usuario->save();

        return redirect('/login')->with('success', 'Usuario registrado con éxito.');
    }

    // 4. Procesa el inicio de sesión
    public function autenticar(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->rol_id == 1) {
                return redirect('/admin/dashboard');
            }

            return redirect('/catalogo');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }


    // Muestra la vista de login (Controlando si ya está logueado)
    public function formularioLogin() {
        // 1. SI EL USUARIO YA ESTÁ LOGUEADO...
        if (\Auth::check()) {
            // Evaluamos el rol y lo mandamos a su panel de una
            if (\Auth::user()->rol_id == 1) {
                return redirect('/admin/dashboard');
            }
            return redirect('/catalogo');
        }

        // 2. SI NO ESTÁ LOGUEADO, muestra la vista normal
        return view('backend.usuarios.login');
    }

    // 5. Cierra la sesión
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}