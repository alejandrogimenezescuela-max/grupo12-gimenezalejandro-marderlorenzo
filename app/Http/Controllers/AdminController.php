<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Producto;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Seguridad: Solo admin
        if (!auth()->check() || auth()->user()->rol_id != 1) {
            return redirect('/cliente');
        }

        // Datos para el dashboard
        $usuarios = Usuario::all();
        $cantUsuarios = $usuarios->count();
        $cantProductos = Producto::count();
        $cantPedidos = 0;

        return view('backend.admin.dashboard', compact('usuarios', 'cantUsuarios', 'cantProductos', 'cantPedidos'));
    }
}
