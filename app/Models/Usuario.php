<?php

namespace App\Models;

// Importaciones necesarias para que funcione la autenticación y los traits
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable 
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 
        'apellido', 
        'email', 
        'password', 
        'rol_id'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ]; 

    protected function casts(): array 
    {
        return [
            'password' => 'hashed', // hashea automáticamente al asignar
        ];
    }

    // Relación: un Usuario pertenece a un Rol → se usa como $usuario->rol
    // ¡Ahora sí está adentro de la clase!
    public function rol() 
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}