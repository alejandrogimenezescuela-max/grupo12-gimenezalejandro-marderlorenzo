<?php

// ELIMINAMOS EL NAMESPACE DE AQUÍ

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
Route::get('/', [ProductoController::class, 'mostrarEnHome']);

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/terminos', function () {
    return view('terminos');
});

Route::get('/construccion', function () {
    return view('construccion');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/exito', function () {
    return view('exito');
});

Route::get('/perfil', function () {
    return view('perfil');
});

// Ahora que quitamos el namespace del archivo, esta línea funcionará perfecto
Route::get('/catalogo', [ProductoController::class, 'index']);

Route::get('/ropa', [ProductoController::class, 'mostrarEnRopa']);

Route::get('/suplementos', [ProductoController::class, 'mostrarEnSuplementos']);

Route::get('/indumentaria', [ProductoController::class, 'mostrarEnIndumentaria']);
