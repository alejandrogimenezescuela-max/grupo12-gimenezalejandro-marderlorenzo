<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarianteProducto extends Model
{
    // Le indicamos la tabla que creamos en la migración
    protected $table = 'variantes_producto';

    // Campos permitidos para carga masiva
    protected $fillable = ['producto_id', 'talle', 'color', 'stock'];

    /**
     * RELACIÓN: Esta variante pertenece a un producto genérico.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
