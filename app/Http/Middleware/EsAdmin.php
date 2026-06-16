<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
 public function handle(Request $request, Closure $next)
{
    // Verifica si el usuario está logueado y si su rol_id es 1 (Admin)
    if (auth()->check() && auth()->user()->rol_id == 1) {
        return $next($request);
    }

    // Si no es admin, lo mandamos al home con un mensaje de error
    return redirect('/')->with('error', 'No tienes permisos de administrador.');
}
}
