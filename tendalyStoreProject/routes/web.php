<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
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

Route::get('/dashboard',[PerfilController::class,'index'])->name('dashboard');
Route::get('/dashboard/perfil',[PerfilController::class,'perfil'])->name('dashboard.perfil');

//Catalogo
Route::get('/catalogo',[CatalogoController::class,'index'])->name('catalogo');

//Enviar al Negocio
Route::get('/negocios/{negocio:nombre}',[NegocioController::class,'show'])->name('negocio.show');
Route::get('/negocio/create',[NegocioController::class,'create'])->name('negocio.create');
Route::post('/negocio',[NegocioController::class,'store'])->name('negocio.store');
Route::get('/dashboard/negocio',[NegocioController::class,'negocioDashboard'])->name('dashboard.negocio');

//Producto
Route::get('/producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('/producto',[ProductoController::class,'store'])->name('producto.store');
Route::get('/dashboard/productos',[ProductoController::class,'productoDashboard'])->name('dashboard.producto');
Route::delete('/productos/{producto}',[ProductoController::class,'destroy'])->name('producto.destroy');

//Comentarios
Route::post('/comentario',[ComentarioController::class,'store'])->name('comentario.store');

//Enviar al muro
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');


Route::get('/provincias/{departamento}', [UbicacionController::class, 'getProvincias']);
Route::get('/distritos/{provincia}', [UbicacionController::class, 'getDistritos']);

