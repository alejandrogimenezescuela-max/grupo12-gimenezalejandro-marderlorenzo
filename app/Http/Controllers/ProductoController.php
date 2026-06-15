<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria; // Importamos Categoria para el select
use App\Models\VarianteProducto; // Importamos las variantes
use Illuminate\Support\Str;

class ProductoController extends Controller
{
 public function index()
{
    // Limpiamos 'variantes' porque ahora talle, color y stock están acá adentro
    $productos = Producto::with('categoria')->get();
    return view('catalogo', compact('productos'));
}

 public function indexHome()
{
    // Cambiamos all() por with('categoria')->get() para que la vista
    // pueda leer el nombre de la categoría sin romper nada.
    $productos = Producto::with('categoria')->get();

    return view('home', compact('productos'));
}
    // --- Muestra el formulario de carga (Panel Admin) ---
    public function create()
    {
        $categorias = Categoria::all(); // Trae las categorías para el select del formulario
        return view('backend.admin.create', compact('categorias'));
    }

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias,id',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'stock_minimo' => 'nullable|integer|min:0',
        'talle' => 'nullable|string|max:50',  // Guarda "A2" o "1kg" indistintamente
        'color' => 'nullable|string|max:50',  // Guarda "Azul" o "Frutilla" indistintamente
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->categoria_id = $request->categoria_id;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->stock_minimo = $request->stock_minimo ?? 2;
    $producto->talle = $request->talle;
    $producto->color = $request->color;
    $producto->descripcion = $request->descripcion;

    if ($request->hasFile('imagen')) {
        // Guardamos la imagen en storage/app/public/productos
        $path = $request->file('imagen')->store('productos', 'public');
        $producto->imagen = $path;
    }

    $producto->save();

    return redirect()->back()->with('success', 'Producto cargado impecable.');
}

    // Método para la sección Ropa (ID 1 en DBeaver)
public function mostrarEnRopa()
{
    // Cambiamos el nombre a $ropa para que coincida con el Blade
    $ropa = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Ropa');
    })->get();

    // Se la pasamos a la vista como 'ropa'
    return view('ropa', compact('ropa'));
}
    // Método para la sección Suplementos (ID 3 en DBeaver)
 public function mostrarEnSuplementos()
{
    $suplementos = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Suplementos');
    })->get();

    return view('suplementos', compact('suplementos'));
}

    // Método para la sección Indumentaria (ID 2 en DBeaver)
public function mostrarEnIndumentaria()
{
    $indumentaria = Producto::whereHas('categoria', function($query) {
        $query->where('nombre', 'Indumentaria');
    })->get();

    return view('indumentaria', compact('indumentaria'));
}

public function show($id)
{
    // Buscamos el producto con su categoría. Si no existe, manda a error 404.
    $producto = Producto::with('categoria')->findOrFail($id);

    return view('detalles', compact('producto'));
}
}
