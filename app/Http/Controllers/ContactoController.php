<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    // Guardar mensaje
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
            'mensaje' => 'required'
        ]);

        Contacto::create($request->all());

        return redirect()->back()->with('success', '¡Mensaje enviado correctamente!');
    }

    // Listar para el Admin
    public function indexAdmin()
    {
        $mensajes = Contacto::latest()->get();
        return view('backend.admin.consultas', compact('mensajes'));
    }

    // Marcar como leída
    public function marcarLeida($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->update(['leida' => true]);
        return redirect()->back()->with('success', 'Marcado como leído.');
    }
}
