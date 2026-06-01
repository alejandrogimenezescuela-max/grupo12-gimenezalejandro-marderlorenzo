<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{

public function index()
{
    // Trae absolutamente todos los productos de DBeaver con sus talles/variantes
    $productos = Producto::with('categoria', 'variantes')->get();

    // Se los mandamos a la vista general llamada 'catalogo'
    return view('catalogo', compact('productos'));
}

public function indexHome()
{
    // Traemos todos los productos (o los primeros 6 u 8 destacados) para armar el carrusel
    $productos = Producto::with('variantes')->get();

    return view('home', compact('productos')); // Asegurate que el view() coincida con el nombre de este archivo blade
}


    // Método para la sección Ropa
    public function mostrarEnRopa()
    {
        // Busca los productos que tengan la categoría 'Indumentaria' (o 'Ropa')
        $ropa = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Indumentaria');
        })->with('variantes')->get();

        // Le pasamos exactamente la variable $ropa a la vista 'ropa'
        return view('ropa', compact('ropa'));
    }

    // Método para la sección Suplementos
    public function mostrarEnSuplementos()
    {
        // Busca los productos de la categoría 'Suplementos'
        $suplementos = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Suplementos');
        })->with('variantes')->get();

        return view('suplementos', compact('suplementos'));
    }

    // Método para la sección Equipamiento (o la que uses aparte)
    public function mostrarEnIndumentaria()
    {
        $indumentaria = Producto::whereHas('categoria', function($query) {
            $query->where('nombre', 'Equipamiento');
        })->with('variantes')->get();

        return view('indumentaria', compact('indumentaria'));
    }
}
