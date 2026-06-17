<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaCabecera extends Model
{
    protected $table = 'ventas_cabecera';
    protected $fillable = ['user_id', 'estado', 'total', 'fecha_venta'];


    public function user()
    {
        // Esto le dice a Laravel: "Esta venta pertenece a un usuario a través de la columna user_id"
        return $this->belongsTo(User::class, 'user_id');
    }
    // -------------------

    public function detalles() {
        return $this->hasMany(VentaDetalle::class, 'venta_id');
    }

    public function scopeFiltrar($query, $request)
    {
        return $query->when($request->estado, function ($q) use ($request) {
            $q->where('estado', $request->estado);
        })->when($request->fecha_inicio, function ($q) use ($request) {
            $q->whereDate('fecha_venta', '>=', $request->fecha_inicio);
        })->when($request->fecha_fin, function ($q) use ($request) {
            $q->whereDate('fecha_venta', '<=', $request->fecha_fin);
        });
    }
}

