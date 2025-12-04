<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\LogisticaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', HomeController::class)->name('home');

//Vista register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
//Enviar inf
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [PerfilController::class, 'index'])->name('dashboard');
Route::get('/dashboard/perfil', [PerfilController::class, 'perfil'])->name('dashboard.perfil');
Route::post('/dashboard/perfil', [PerfilController::class, 'store'])->name('dashboard.perfil.store');

//Direcciones
Route::get('/dashboard/perfil/direcciones/', [DireccionesController::class, 'index'])->name('direcciones.index');
Route::get('/dashboard/perfil/direcciones/create', [DireccionesController::class, 'create'])->name('direcciones.create');
Route::get('/dashboard/perfil/direcciones/{direccion:id}/edit',[DireccionesController::class,'edit'])->name('direcciones.edit');

//Catalogo
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');

//Nosotros
Route::get('/nosotros',[NosotrosController::class,'index'])->name('nosotros');

//Enviar al Negocio
Route::get('/negocios/{negocio:nombre}', [NegocioController::class, 'show'])->name('negocio.show');
Route::get('/dashboard/negocio/create', [NegocioController::class, 'create'])->name('negocio.create');
Route::post('/negocio', [NegocioController::class, 'store'])->name('negocio.store');
Route::get('/dashboard/negocio', [NegocioController::class, 'negocioDashboard'])->name('dashboard.negocio');
Route::get('/dashboard/negocio/{negocio:nombre}/edit',[NegocioController::class,'edit'])->name('negocio.edit');

//Producto
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::get('/producto/{producto:nombre}', [ProductoController::class, 'show'])->name('producto.show');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/dashboard/productos/{producto:nombre}/edit',[ProductoController::class,'edit'])->name('producto.edit');
Route::get('/dashboard/productos', [ProductoController::class, 'productoDashboard'])->name('dashboard.producto');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
Route::patch('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('producto.restore');

//Logistica
Route::get('/dashboard/negocios/logistica',[LogisticaController::class,'create'])->name('logistica.create');

//Carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');

//Comentarios
Route::post('/comentario', [ComentarioController::class, 'store'])->name('comentario.store');

Route::get('/checkout/{negocio:nombre}',[CheckoutController::class,'index'])->name('orden.checkout');
Route::get('/ordenes/confirmado/{orden:id}',[OrdenController::class,'exito'])->name('orden.exito');

//Enviar al muro
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');


Route::get('/provincias/{departamento}', [UbicacionController::class, 'getProvincias']);
Route::get('/distritos/{provincia}', [UbicacionController::class, 'getDistritos']);

