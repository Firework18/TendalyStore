<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('principal');
});

Route::get('/prueba', function () {
    return view('prueba');
});

//Vista register
Route::get('/register',[RegisterController::class,'index'])->name('register');
//Enviar inf
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index']);