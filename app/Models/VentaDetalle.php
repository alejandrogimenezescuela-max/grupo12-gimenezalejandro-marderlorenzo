<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $table = 'ventas_detalle'; // Asegura que apunte a tu tabla
    protected $fillable = ['venta_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];

    // Relación: el detalle pertenece a una cabecera
    public function venta() {
        return $this->belongsTo(VentaCabecera::class, 'venta_id');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
