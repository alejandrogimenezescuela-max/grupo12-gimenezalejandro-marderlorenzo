<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    // 1. Agregamos 'categoria_id' para que Laravel permita guardarlo desde los formularios o Tinker
    protected $fillable = ['categoria_id', 'nombre', 'descripcion', 'precio', 'stock_minimo', 'imagen'];

    /**
     * RELACIÓN INVERSA: Un producto pertenece a una Categoría.
     * Te permite hacer: $producto->categoria->nombre (ej: "Suplementos")
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * RELACIÓN: Un producto tiene muchas variantes (Talles/Colores/Stock real).
     * Te permite hacer: $producto->variantes
     */
    public function variantes()
    {
        return $this->hasMany(VarianteProducto::class, 'producto_id');
    }
}
