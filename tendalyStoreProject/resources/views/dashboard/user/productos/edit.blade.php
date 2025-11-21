@extends('dashboard.user.app')

@section('titulo', 'Crear Nuevo Producto')

@section('contenido')

    <main class="container mx-auto mt-2 mb-8 p-1">
        <div class="mb-6 flex items-center text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('dashboard.producto') }}" class="text-sm font-medium">Ir a la tabla de productos</a>
        </div>

        <h2 class="font-extrabold text-center text-4xl mb-8 p-3 text-gray-800">Editar Producto: {{ $producto->nombre }}</h2>
        <div>
            <livewire:editar-producto :producto="$producto" />

        </div>
    </main>

@endsection
