<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ProductoController extends Controller
{
    // MÉTODO 1: Para la vista de Catálogo completa
    public function index()
    {
        $productos = $this->getListaProductos(); // Llamamos a la "bodega" de datos
        return view('catalogo', compact('productos'));
    }

    // MÉTODO 2: Para otra vista (ejemplo: la Home o Ropa)
    public function mostrarEnHome()
    {
        $productos = $this->getListaProductos(); // Usamos la misma data
        return view('home', compact('productos'));
    }

       public function mostrarEnSuplementos()
    {
        $suplementos = $this->getListaSuplementos(); // Usamos la misma data
        return view('suplementos', compact('suplementos'));
    }


       public function mostrarEnIndumentaria()
    {
        $indumentaria = $this->getListaIndumentaria(); // Usamos la misma data
        return view('indumentaria', compact('indumentaria'));
    }

    public function mostrarEnRopa()
    {
        $ropa = $this->getListaRopa(); // Usamos la misma data
        return view('ropa', compact('ropa'));
    }

    // "LA BODEGA": Una función privada que solo sirve para guardar el array
    private function getListaProductos()
    {
        return [
            ['nombre' => 'Tibial Bronx', 'precio' => 70500, 'imagen' => 'producto10.jpg', 'talles' => ['M', 'L', 'XL']],
            ['nombre' => 'Faixa BJJ Shiai', 'precio' => 25000, 'imagen' => 'producto11.jpg', 'talles' => ['A1', 'A2', 'A3']],
            ['nombre' => 'Protector Bucal SMAI', 'precio' => 12000, 'imagen' => 'producto6.jpg', 'talles' => ['Único']],
            ['nombre' => 'Kimono Shiai Gold', 'precio' => 110000, 'imagen' => 'producto1.jpg', 'talles' => ['A1', 'A2']],
            ['nombre' => 'Rashguard Tatami', 'precio' => 45000, 'imagen' => 'producto2.jpg', 'talles' => ['S', 'M', 'L']],
            ['nombre' => 'Pantalón Grappling', 'precio' => 38000, 'imagen' => 'producto12.jpg', 'talles' => ['40', '42']]
        ];
    }


     private function getListaSuplementos()
    {
          return  [
        [
            'nombre' => 'Creatina 1kg StarNutrition',
            'precio' => 70000,
            'imagen' => 'producto7.jpg',
            'talles' => ['Neutro', 'Frutos Rojos']
        ],
        [
            'nombre' => 'Whey Protein 2lb StarNutrition',
            'precio' => 45000,
            'imagen' => 'producto8.jpg',
            'talles' => ['Chocolate', 'Vainilla', 'Cookies', 'Frutilla']
        ],
        [
            'nombre' => 'Omega 3 Fish Oil StarNutrition',
            'precio' => 33000,
            'imagen' => 'producto9.jpg',
            'talles' => ['60 cápsulas']
        ],
    ];
    }

      private function getListaIndumentaria()
    {
          return [
        [
            'nombre' => 'Cabezal Boxeo TatamiHUB',
            'precio' => 100000,
            'imagen' => 'producto4.jpg',
            'talles' => ['M', 'L', 'XL']
        ],
        [
            'nombre' => 'Guantes Boxeo TatamiHUB',
            'precio' => 45000,
            'imagen' => 'producto5.jpg',
            'talles' => ['6oz', '8oz']
        ],
        [
            'nombre' => 'Protector Bucal TatamiHUB',
            'precio' => 35000,
            'imagen' => 'producto6.jpg',
            'talles' => ['Azul', 'Rojo']
        ],

        [
            'nombre' => 'Tibial Bronx',
            'precio' => 75000,
            'imagen' => 'producto10.jpg',
            'talles' => ['Azul', 'Rojo']
        ],

         [
            'nombre' => 'Tibial  TatamiHUB Unlimited',
            'precio' => 85000,
            'imagen' => 'producto14.jpg',
            'talles' => ['Rojo']
        ],

         [
            'nombre' => 'Guante MMA TatamiHUB Unlimited',
            'precio' => 55000,
            'imagen' => 'producto15.jpg',
            'talles' => ['S', 'M', 'L']
        ],
    ];
    }

    private function getListaRopa()
{
    return [ // <--- Agregamos este corchete para empezar la lista
        [
            'nombre' => 'Kimono Negro Pro',
            'precio' => 300000,
            'imagen' => 'producto1.jpg',
            'talles' => ['A1', 'A2', 'A3']
        ],
        [
            'nombre' => 'Rashguard TatamiHUB',
            'precio' => 100000,
            'imagen' => 'producto2.jpg',
            'talles' => ['S', 'M', 'L', 'XL']
        ],
        [
            'nombre' => 'Short Muay Thai',
            'precio' => 35000,
            'imagen' => 'producto3.jpg',
            'talles' => ['M', 'L']
        ],
        [
            'nombre' => 'Short Grappling',
            'precio' => 45000,
            'imagen' => 'producto12.jpg',
            'talles' => ['M', 'L']
        ],
        [
            'nombre' => 'Faixa Jiu-Jitsu',
            'precio' => 25000,
            'imagen' => 'producto11.jpg',
            'talles' => ['A2', 'A3']
        ],
        [
            'nombre' => 'Remera Lycra termica Unlimited',
            'precio' => 35000,
            'imagen' => 'producto13.jpg',
            'talles' => ['S', 'M']
        ],
    ];
}
}
