<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Asegúrate que tu modelo sea este o User
use App\Models\Producto;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check() || auth()->user()->rol_id != 1) {
            return redirect('/cliente');
        }

        $usuarios = User::all();
        $cantUsuarios = $usuarios->count();
        $cantProductos = Producto::count();
        $cantPedidos = 0;

        return view('backend.admin.dashboard', compact('usuarios', 'cantUsuarios', 'cantProductos', 'cantPedidos'));
    }

    public function verProductos()
    {
        $productos = Producto::all();
        return view('backend.admin.lista-productos', compact('productos'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('backend.admin.editar', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('admin.productos')->with('success', 'Producto eliminado correctamente');
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        if ($usuario->rol_id == 1) {
            return redirect()->back()->with('error', 'No puedes eliminar a un administrador.');
        }
        $usuario->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('backend.admin.usuarios-editar', compact('usuario'));
    }

    public function updateUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $data = $request->only(['nombre', 'apellido', 'direccion', 'telefono']);

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $usuario->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Usuario actualizado con éxito.');
    }

    public function listarUsuarios()
    {
        $usuarios = User::all();
        // Cuidado: antes tenías 'usuarios-editar' aquí. Si es para listar, debe ser 'index' o similar.
        return view('backend.admin.dashboard', compact('usuarios'));
    }
}
