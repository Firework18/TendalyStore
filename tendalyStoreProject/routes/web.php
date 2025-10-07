<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});
Route::get('/catalogo', function () {
    return view('catalogo');
});
Route::get('/negocio', function () {
    return view('negocio');
});

