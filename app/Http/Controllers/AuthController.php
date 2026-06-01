<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // 1. Muestra la vista de login (Controlando si ya está logueado)
    public function formularioLogin() {
        if (auth()->check()) {
            /** @var \App\Models\Usuario $usuario */
            $usuario = auth()->user();

            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }
            return redirect('/cliente');
        }

        return view('backend.usuarios.login');
    }

    // 2. Muestra la vista de registro (Controlando si ya está logueado)
    public function formularioRegistro() {
        if (auth()->check()) {
            /** @var \App\Models\Usuario $usuario */
            $usuario = auth()->user();

            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }
            return redirect('/cliente');
        }

        return view('backend.usuarios.registro');
    }

    // 3. Procesa el formulario de registro público (Crea Clientes)
    public function registrar(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $rolCliente = Rol::where('nombre', 'Cliente')->first();
        $rolId = $rolCliente ? $rolCliente->id : 2;

        $usuario = new Usuario();
        $usuario->nombre = $request->name . ' ' . $request->lastname;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->rol_id = $rolId;
        $usuario->save();

        return redirect('/login')->with('success', 'Usuario registrado con éxito.');
    }

   // 4. Procesa el inicio de sesión
    public function autenticar(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credenciales)) {
            $request->session()->regenerate();

            /** @var \App\Models\Usuario $usuario */
            $usuario = auth()->user();

            // REDIRECCIÓN CON URL CORRECTA (CON BARRA, SIN PUNTOS)
            if ($usuario->rol_id == 1) {
                return redirect('/admin/dashboard');
            }

            return redirect('/cliente');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // 5. Cierra la sesión de forma segura
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }

    // Muestra el panel del cliente con sus datos (¡Ahora permite Administradores!)
    public function panelCliente() {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Se eliminó el rebote para que el Admin también pueda renderizar esta vista libremente.
        return view('backend.usuarios.cliente');
    }

   // Guarda o actualiza la dirección del cliente
    public function guardarDireccion(Request $request) {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        /** @var \App\Models\Usuario $usuario */
        $usuario = auth()->user();

        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->save();

        return back()->with('success', 'Dirección actualizada correctamente.');
    }
}
