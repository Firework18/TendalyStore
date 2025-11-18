@extends('layouts.app') {{-- Asegúrate que tu layout principal se llama 'app.blade.php' --}}

@section('titulo', $negocio->nombre)

@section('contenido')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
        <div class="mb-6 flex items-center text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
            <i class="bi bi-chevron-left mr-2 text-base"></i>
            <a href="{{ url('/catalogo') }}" class="text-sm font-medium text-[#555]">Volver al catálogo</a>
        </div>
    </div>

    <div class="bg-white overflow-hidden mb-10">
        <div class="md:flex max-w-7xl mx-auto">
            <div class="md:w-1/2 relative">
                <img src="{{ asset('/uploads/' . $negocio->imagen) }}" alt="{{ $negocio->nombre }}"
                    class="w-full h-72 md:h-[550px] rounded-md object-cover object-center">
                <div
                    class="absolute top-4 left-4 bg-[#4CAF50] text-white text-xs font-semibold px-3 py-1 rounded-full tracking-wide opacity-90">
                    {{ $negocio->categoria->nombre }}</div>

            </div>

            <div class="md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-3 leading-tight">{{ $negocio->nombre }}
                </h1>
                <div class="flex items-center mb-5 text-sm text-gray-600">
                    <i class="bi bi-star-fill text-yellow-400 mr-1 text-base"></i>
                    <livewire:mostrar-rating :negocio_id="$negocio->id">
                    <span class="mx-3 text-gray-300">|</span>
                    <i class="bi bi-geo-alt-fill mr-1 text-base text-gray-500"></i>
                    <span>Lima, Perú</span>
                </div>
                <p class="text-gray-700 text-base leading-relaxed mb-7">
                    {{ $negocio->descripcion }}
                </p>

                <div class="flex flex-wrap gap-2.5">
                    <span class="bg-indigo-100 text-indigo-700 text-xs font-medium px-3 py-1 rounded-full">Productos
                        Amazónicos</span>
                    <span class="bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">Comercio
                        Justo</span>
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-medium px-3 py-1 rounded-full">Ingredientes
                        Naturales</span>
                    <span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">Sostenibilidad</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-10 mb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Sobre Nosotros</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                <div>
                    <p class="text-gray-700 text-base leading-relaxed mb-4">
                        {{ $negocio->historia }}
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 md:p-8 border border-gray-100">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Información de Contacto</h3>
                    <div class="space-y-3 text-gray-700 text-sm">
                        <p class="flex items-center"><i
                                class="bi bi-whatsapp mr-3 text-base text-green-600"></i>{{ $negocio->telefono }}
                        </p>

                        <p class="flex items-center"><i
                                class="bi bi-envelope mr-3 text-base text-red-600"></i>{{ $negocio->correo }}</p>
                        <p class="flex items-center"><i
                                class="bi bi-geo-alt-fill mr-3 text-base text-gray-500"></i>{{ $negocio->ubicacion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:productos-negocio :negocio_id="$negocio->id"/>

    

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Reseñas</h2>

        

        @auth
            @if ($negocio->user_id !== auth()->id())
                <livewire:anadir-comentario :negocio_id="$negocio->id" />
            @else
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8 rounded-md">
                    <p class="text-sm text-blue-800">
                        Eres el propietario de este negocio, no puedes dejar un comentario.
                    </p>
                </div>
            @endif
        @endauth

        @guest
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-md">
                <p class="text-sm text-yellow-800">
                    Necesitas <a href="{{ route('login') }}" class="font-medium underline text-yellow-800 hover:text-yellow-900">
                        iniciar sesión
                    </a> para dejar un comentario.
                </p>
            </div>
        @endguest
    
    {{-- Listado de comentarios Livewire --}}
    <livewire:lista-comentarios :negocio_id="$negocio->id" />
    </div>


        {{-- Sección Negocios Similares --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Negocios Similares</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 xl:gap-8">
                @foreach ($negociosSimilares as $negocioSimilar)
                    <a href="{{ route('negocio.show', $negocioSimilar) }}"
                        class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                        <img src="{{ asset('uploads/' . $negocioSimilar->imagen) }}" alt="Logo Amazonia Verde"
                            class="w-28 h-28  mb-3 rounded-full border border-gray-200  shadow-sm">
                        <h3 class="font-semibold text-gray-800 text-base">{{ $negocioSimilar->nombre }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
   
    @endsection

    
