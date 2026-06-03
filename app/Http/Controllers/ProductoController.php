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
        $productos = Producto::with('categoria', 'variantes')->get();
        return view('catalogo', compact('productos'));
    }

    public function indexHome()
    {
        $productos = Producto::with('variantes')->get();
        return view('home', compact('productos')); 
    }

    // --- Muestra el formulario de carga (Panel Admin) ---
    public function create()
    {
        $categorias = Categoria::all(); // Trae las categorías para el select del formulario
        return view('backend.admin.create', compact('categorias'));
    }

    // --- Procesa el formulario, sube la imagen y guarda en DB ---
    public function store(Request $request)
    {
        // 1. Validamos los datos principales del producto
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
            
            // Validación de las variantes (vienen como arrays)
            'talle' => 'required|array',
            'color' => 'required|array',
            'stock' => 'required|array',
        ]);

        // 2. Procesar y guardar la imagen física
        $nombreImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            // Creamos un nombre único: ej: kimono-vulkan-17182938.png
            $nombreImagen = Str::slug($request->nombre) . '-' . time() . '.' . $imagen->getClientOriginalExtension();
            // La guarda en la carpeta pública: public/img/productos/
            $imagen->move(public_path('img/productos'), $nombreImagen);
        }

        // 3. Crear el Producto genérico en la DB
        $producto = Producto::create([
            'categoria_id' => $request->categoria_id,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock_minimo' => $request->stock_minimo,
            'imagen' => 'img/productos/' . $nombreImagen, // Guardamos la ruta relativa
        ]);

        // 4. Guardar las variantes asociadas a este producto
        foreach ($request->talle as $index => $talleValor) {
            VarianteProducto::create([
                'producto_id' => $producto->id, // El ID recién generado
                'talle' => $talleValor,
                'color' => $request->color[$index] ?? 'N/A',
                'stock' => $request->stock[$index] ?? 0,
            ]);
        }

        return redirect()->route('backend.admin.create')->with('success', 'Producto y variantes cargados con éxito.');
    }

    // Método para la sección Ropa (ID 1 en DBeaver)
    public function mostrarEnRopa()
    {
        // CAMBIO: Buscamos 'Ropa' para que coincida exactamente con tu tabla
        $ropa = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Ropa');
        })->with('variantes')->get();
        return view('ropa', compact('ropa'));
    }

    // Método para la sección Suplementos (ID 3 en DBeaver)
    public function mostrarEnSuplementos()
    {
        // Mantiene 'Suplementos' porque está igual en DBeaver
        $suplementos = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Suplementos');
        })->with('variantes')->get();
        return view('suplementos', compact('suplementos'));
    }

    // Método para la sección Indumentaria (ID 2 en DBeaver)
    public function mostrarEnIndumentaria()
    {
        // CAMBIO: Queda buscando 'Indumentaria' para diferenciarlo de la sección Ropa
        $indumentaria = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Indumentaria');
        })->with('variantes')->get();
        return view('indumentaria', compact('indumentaria'));
    }
}