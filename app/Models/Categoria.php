<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // 1. Le indicamos la tabla exacta
    protected $table = 'categorias';

    // 2. Definimos los campos rellenables
    protected $fillable = ['nombre'];

    /**
     * RELACIÓN: Una categoría tiene muchos productos.
     * ¡Este método es el que necesita whereHas para funcionar!
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}