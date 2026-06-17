<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

// 1. Vinculamos el modelo a tu tabla real "usuarios"
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    const DELETED_AT = 'deleted_at';
    protected $table = 'usuarios'; // Le avisamos a Laravel que la tabla se llama usuarios

    // 2. Habilitamos TODOS los campos de tu formulario y tabla para que se puedan guardar
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'direccion',
        'telefono',
        'rol_id', // <-- Clave para que se guarde si es admin o cliente
    ];

    // 3. Protegemos los datos sensibles para que no se muestren en las consultas comunes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Esto encripta la contraseña automáticamente al guardar
        ];
    }

    public function tienePerfilCompleto()
{
    // Devuelve true si ambos campos tienen datos
    return !empty($this->direccion) && !empty($this->telefono);
}
}
