<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CarritoController;


// --- RUTAS PÚBLICAS (Cualquiera puede acceder) ---
Route::get('/', [ProductoController::class, 'indexHome']);
Route::get('/nosotros', fn() => view('nosotros'));
Route::get('/comercializacion', fn() => view('comercializacion'));
Route::get('/terminos', fn() => view('terminos'));
Route::get('/construccion', fn() => view('construccion'));
Route::get('/contacto', fn() => view('contacto'));
Route::get('/catalogo', [ProductoController::class, 'index']);
Route::get('/ropa', [ProductoController::class, 'mostrarEnRopa']);
Route::get('/suplementos', [ProductoController::class, 'mostrarEnSuplementos']);
Route::get('/indumentaria', [ProductoController::class, 'mostrarEnIndumentaria']);
Route::get('/olvidaste-contrasena', [AuthController::class, 'mostrarOlvide']);
Route::post('/olvidaste-contrasena', [AuthController::class, 'enviarDatosLogin']);
Route::post('/contacto', [ContactoController::class, 'enviar']);

// --- RUTAS PARA INVITADOS (Solo si NO están logueados) ---
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'formularioLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'autenticar']);
    Route::get('/register', [AuthController::class, 'formularioRegistro']);
    Route::post('/register', [AuthController::class, 'registrar']);
});

// --- RUTAS PARA USUARIOS LOGUEADOS (Clientes) ---
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cliente', [AuthController::class, 'panelCliente']);
    Route::post('/cliente/guardar-direccion', [AuthController::class, 'guardarDireccion'])->name('cliente.guardar_direccion');
    Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
    Route::get('/descargar-comprobante', [CarritoController::class, 'generarComprobante'])->name('comprobante.generar');
    Route::get('/cliente/historial', [AuthController::class, 'verHistorial'])->name('cliente.historial');
    Route::get('/cliente/detalle/{id}', [AuthController::class, 'verDetalle'])->name('cliente.detalle');
    Route::put('/cliente/actualizar', [AuthController::class, 'updatePerfil'])->name('cliente.updatePerfil');
});

// --- RUTAS PROTEGIDAS: SOLO ADMINISTRADORES (Middleware 'es_admin') ---
// CÓDIGO CORREGIDO
Route::middleware(['auth', 'es_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Gestión de productos
    Route::get('/productos', [AdminController::class, 'verProductos'])->name('admin.productos');
    Route::get('/cargar', [ProductoController::class, 'create'])->name('backend.admin.create');
    Route::post('/cargar', [ProductoController::class, 'store'])->name('backend.admin.store');
    Route::get('/editar/{id}', [AdminController::class, 'edit'])->name('producto.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('producto.update');
    Route::delete('/eliminar/{id}', [AdminController::class, 'destroy'])->name('producto.destroy');

    // CORRECCIÓN AQUÍ: Quitamos el "admin/"
    Route::get('/ventas', [AdminController::class, 'verVentas'])->name('admin.ventas');

    // Gestión de usuarios
    Route::get('/usuarios', [AdminController::class, 'listarUsuarios'])->name('admin.usuarios');
    Route::get('/usuarios/{id}/editar', [AdminController::class, 'editarUsuario'])->name('admin.usuarios.editar');
    Route::delete('/eliminar-usuario/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.eliminarUsuario');
    Route::put('/usuarios/{id}', [AdminController::class, 'updateUsuario'])->name('admin.usuarios.update');

    // CORRECCIÓN AQUÍ TAMBIÉN: Quitamos el "admin/" de las consultas
    Route::get('/consultas', [ContactoController::class, 'indexAdmin'])->name('admin.consultas');
    Route::put('/consultas/{id}', [ContactoController::class, 'marcarLeida'])->name('admin.consultas.marcar');
});

// --- Rutas del Carrito de Compras ---
Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

    // MANTÉN SOLO ESTA LÍNEA PARA CONFIRMAR
    Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])->name('carrito.confirmar');

    // Esta es tu ruta para la vista de éxito
    Route::get('/compra-confirmada', function () {
        return view('backend.usuarios.compra-confirmada');
    })->name('compra.confirmada'); // <--- ESTE ES EL NOMBRE CORRECTO
});


