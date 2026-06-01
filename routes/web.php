<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


// Rutas para el Registro (Corregidas con ::class)
Route::get('/register', [AuthController::class, 'formularioRegistro']);
Route::post('/register', [AuthController::class, 'registrar']);

// Rutas para el Login (Corregidas con ::class)
Route::get('/login', [AuthController::class, 'formularioLogin']);
Route::post('/login', [AuthController::class, 'autenticar']);
Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/comercializacion', function () {
    return view('comercializacion');
});

Route::get('/', [ProductoController::class, 'indexHome']);

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

// Rutas exclusivas para usuarios que NO iniciaron sesión (Invitados)
Route::middleware(['guest'])->group(function () {

    // Ahora le pedimos al controlador que decida qué mostrar
    Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');

    Route::get('/register', function () {
        return view('backend.usuarios.registro');
    })->name('register');
});


Route::get('/catalogo', [ProductoController::class, 'index']);

Route::get('/ropa', [ProductoController::class, 'mostrarEnRopa']);

Route::get('/suplementos', [ProductoController::class, 'mostrarEnSuplementos']);

Route::get('/indumentaria', [ProductoController::class, 'mostrarEnIndumentaria']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cliente', [App\Http\Controllers\AuthController::class, 'panelCliente'])->middleware('auth');

Route::post('/cliente/guardar-direccion', [App\Http\Controllers\AuthController::class, 'guardarDireccion'])->name('cliente.guardar_direccion')->middleware('auth');

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
