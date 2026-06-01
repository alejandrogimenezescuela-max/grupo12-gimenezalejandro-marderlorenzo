<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // 1. Le indicamos la tabla exacta de la base de datos
    protected $table = 'categorias';

    // 2. Definimos qué campos se pueden cargar de forma masiva
    protected $fillable = ['nombre'];

    /**
     * RELACIÓN: Una categoría tiene muchos productos.
     * Esto te va a permitir hacer cosas como: $categoria->productos
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
