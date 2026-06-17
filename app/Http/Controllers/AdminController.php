<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\VentaCabecera;

class AdminController extends Controller
{
   public function dashboard()
{
    $usuarios = User::all();
    $cantUsuarios = $usuarios->count();
    $cantProductos = Producto::count();
    $cantVentas = \App\Models\VentaCabecera::where('estado', '=', 'confirmado')->count();

    return view('backend.admin.dashboard', compact('usuarios', 'cantUsuarios', 'cantProductos', 'cantVentas'));
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

    // Al ejecutarse el delete, Laravel ya hace el SoftDelete gracias al trait
    $usuario->delete();

    // Redirigimos al dashboard con un mensaje de éxito
    return redirect()->route('admin.dashboard')->with('success', 'Usuario eliminado correctamente.');
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
        return view('backend.admin.dashboard', compact('usuarios'));
    }

    public function verVentas(Request $request)
{
    // Obtenemos las ventas aplicando los filtros y paginación
    $ventas = VentaCabecera::with('user') // Cargamos el usuario para mostrar quién compró
        ->filtrar($request)
        ->latest()
        ->paginate(15);

    return view('backend.admin.ventas', compact('ventas'));
}



}
