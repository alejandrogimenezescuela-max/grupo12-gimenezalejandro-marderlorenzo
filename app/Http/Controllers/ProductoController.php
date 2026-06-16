<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    // ==========================================
    // VISTAS DE LECTURA (Usuario final)
    // ==========================================

    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('catalogo', compact('productos'));
    }

    public function indexHome()
    {
        $productos = Producto::with('categoria')->get();
        return view('home', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('detalles', compact('producto'));
    }

    // Métodos dinámicos para categorías
public function mostrarEnRopa()
{
    $ropa = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Ropa');
    })->get();

    return view('ropa', compact('ropa'));
}

public function mostrarEnSuplementos()
{
    $suplementos = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Suplementos');
    })->get();

    return view('suplementos', compact('suplementos'));
}

public function mostrarEnIndumentaria()
{
    $indumentaria = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Indumentaria');
    })->get();

    return view('indumentaria', compact('indumentaria'));
}
    // ==========================================
    // PANEL ADMIN (CRUD)
    // ==========================================

    public function create()
    {
        $categorias = Categoria::all();
        return view('backend.admin.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $producto = new Producto($request->except('imagen'));
        $producto->stock_minimo = $request->stock_minimo ?? 2;

        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        $producto->save();
        return redirect()->back()->with('success', 'Producto cargado impecable.');
    }

    /**
     * BAJA LÓGICA
     * Gracias al trait SoftDeletes en el modelo,
     * el delete() marca la fila en 'deleted_at'
     * en lugar de borrarla de la base de datos.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('admin.productos')->with('success', 'Producto enviado a la papelera.');
    }

    // Método opcional: para restaurar productos
    public function restore($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();

        return redirect()->back()->with('success', 'Producto restaurado.');
    }
}
