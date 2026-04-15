<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

