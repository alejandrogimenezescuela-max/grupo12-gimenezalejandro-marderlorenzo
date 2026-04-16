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
