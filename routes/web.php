<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/exito', function () {
    return view('exito');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/ropa', function () {
    return view('ropa');
});