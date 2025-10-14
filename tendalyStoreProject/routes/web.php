<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('principal');
});


//Vista register
Route::get('/register',[RegisterController::class,'index'])->name('register');
//Enviar inf
Route::post('/register',[RegisterController::class,'store']);

//Enviar al muro o perfil
Route::get('/perfil',[PostController::class,'index'])->name('post.index');

Route::get('/login',[LoginController::class,'index'])->name('login');