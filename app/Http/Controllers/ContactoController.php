<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Procesa el envío del formulario
    public function enviar(Request $request)
    {
        // 1. Validamos que no nos manden cosas vacías
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mensaje' => 'required|string|min:5',
        ], [
            'nombre.required' => 'Por favor, decinos tu nombre.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresá un formato de email válido.',
            'mensaje.required' => 'El mensaje no puede estar vacío.',
            'mensaje.min' => 'El mensaje debe tener al menos 5 caracteres.',
        ]);

        // 2. Guardamos en la base de datos
        Contacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        // 3. Volvemos para atrás con un mensaje de éxito
        return back()->with('success', '¡Tu mensaje fue enviado con éxito! Nos contactaremos pronto.');
    }
}