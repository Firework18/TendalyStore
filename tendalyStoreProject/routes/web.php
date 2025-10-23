<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('principal');
});


//Vista register
Route::get('/register',[RegisterController::class,'index'])->name('register');
//Enviar inf
Route::post('/register',[RegisterController::class,'store']);


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/perfil',[PerfilController::class,'index'])->name('perfil');
//Catalogo
Route::get('/catalogo',[CatalogoController::class,'index'])->name('catalogo');


//Enviar al muro
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');
Route::get('/negocio/create',[PostController::class,'create'])->name('post.create');

