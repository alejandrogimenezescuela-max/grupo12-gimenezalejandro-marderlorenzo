<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Seguridad: Si alguien quiere entrar a la fuerza sin ser Admin, lo sacamos
        if (!auth()->check() || auth()->user()->rol_id != 1) {
            return redirect('/cliente');
        }

        // Traemos todos los usuarios para la tabla que pide el taller
        $usuarios = Usuario::all();
        $cantUsuarios = $usuarios->count();

        // Hardcodeamos temporalmente las otras tarjetas hasta que tengas listos sus modelos
        $cantProductos = 0;
        $cantPedidos = 0;

        return view('backend.admin.dashboard', compact('usuarios', 'cantUsuarios', 'cantProductos', 'cantPedidos'));
    }
}
