<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos'; // Forzamos el nombre de la tabla en español

   protected $fillable = ['nombre', 'email', 'mensaje', 'leida'];
}
