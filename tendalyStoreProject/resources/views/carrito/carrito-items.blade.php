@extends('layouts.app')

@section('titulo', 'Mi Carrito de Compras')

@section('contenido')
    <main class="container mx-auto md:mt-2 px-4 py-8 min-h-screen mb-5">
    @livewire('carrito-compras', ['carrito' => $carrito]) 
        
    </main>
@endsection
