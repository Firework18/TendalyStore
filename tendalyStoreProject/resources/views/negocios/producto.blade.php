@extends('layouts.app')

@section('titulo', 'Detalles del Producto')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden md:flex">
        <div class="md:w-1/2 p-6 flex items-center justify-center bg-gray-50">
            <img src="{{ asset('uploads/'. $producto->imagen)  }}" alt="{{ $producto->nombre }}" class="max-w-full h-auto rounded-lg shadow-md object-contain max-h-96">
        </div>

        @livewire('anadir-carrito', ['producto' => $producto])
        
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('negocio.show',$negocio->nombre) }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300 ease-in-out">
            <i class="bi bi-arrow-left mr-2"></i>
            Volver
        </a>
    </div>
</div>

@endsection

