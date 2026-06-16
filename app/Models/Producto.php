<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{

    use SoftDeletes;

    protected $table = 'productos';

    // CORRECCIÓN: Agregamos talle, color y stock para que Laravel te deje guardarlos de una
    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'talle',
        'color',
        'stock',
        'stock_minimo',
        'imagen'
    ];

    /**
     * RELACIÓN INVERSA: Un producto pertenece a una Categoría.
     * Te permite hacer: $producto->categoria->nombre (ej: "Suplementos")
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

}
