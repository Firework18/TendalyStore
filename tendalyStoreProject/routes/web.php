<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\UbicacionController;
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

//Enviar al Negocio
Route::get('/negocio/create',[NegocioController::class,'create'])->name('negocio.create');
Route::post('/negocio',[NegocioController::class,'store'])->name('negocio.store');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

Route::get('/provincias/{departamento}', [UbicacionController::class, 'getProvincias']);
Route::get('/distritos/{provincia}', [UbicacionController::class, 'getDistritos']);

