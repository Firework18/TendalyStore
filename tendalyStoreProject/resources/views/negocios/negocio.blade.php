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
                    class="w-full h-72 md:h-[550px] object-cover object-center">
                <div
                    class="absolute top-4 left-4 bg-[#4CAF50] text-white text-xs font-semibold px-3 py-1 rounded-full tracking-wide opacity-90">
                    {{ $negocio->categoria->nombre }}</div>
                <div class="absolute top-4 right-4 flex space-x-3">
                    <button
                        class="bg-white p-2.5 rounded-full shadow-md text-gray-700 hover:bg-gray-100 transition duration-200"><i
                            class="bi bi-heart text-base"></i></button>
                    <button
                        class="bg-white p-2.5 rounded-full shadow-md text-gray-700 hover:bg-gray-100 transition duration-200"><i
                            class="bi bi-share text-base"></i></button>
                </div>
            </div>

            <div class="md:w-1/2 p-6 md:p-10 flex flex-col justify-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-3 leading-tight">{{ $negocio->nombre }}
                </h1>
                <div class="flex items-center mb-5 text-sm text-gray-600">
                    <i class="bi bi-star-fill text-yellow-400 mr-1 text-base"></i>
                    <span class="font-semibold">{{ $puntuacion }}</span> <span
                        class="text-gray-500 ml-1">({{ $comentarios->count() }}
                        reseñas)</span>
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        @if ($productos && $productos->count() > 0)
            <div class="mb-10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900">Nuestros Productos</h2>

                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 xl:gap-8">
                    @foreach ($productos as $producto)
                        <div
                            class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                            <div class="relative">
                                <img src="{{ asset('/uploads/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                    class="w-full h-48 object-cover object-center">
                                <button
                                    class="absolute top-3 right-3 bg-white p-2 rounded-full text-gray-600 hover:text-red-500 shadow-sm transition duration-200"><i
                                        class="bi bi-heart text-base"></i></button>

                                @if ($producto->precio_oferta && $producto->precio_oferta < $producto->precio)
                                    <span
                                        class="absolute bottom-3 left-3 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">Oferta</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 text-lg mb-1">{{ $producto->nombre }}</h3>
                                <p class="text-gray-500 text-sm mb-3">{{ Str::limit($producto->descripcion, 50) }}</p>
                                <div class="flex items-baseline mb-3">
                                    @if ($producto->precio_oferta && $producto->precio_oferta < $producto->precio)
                                        <span
                                            class="text-red-700 font-extrabold text-xl mr-2">S/.{{ number_format($producto->precio_oferta, 2) }}</span>
                                        <span
                                            class="text-gray-500 line-through text-base">S/.{{ number_format($producto->precio, 2) }}</span>
                                    @else
                                        <span
                                            class="text-gray-800 font-extrabold text-xl">S/.{{ number_format($producto->precio, 2) }}</span>
                                    @endif
                                </div>

                                <button
                                    class="w-full bg-red-700 text-white py-2.5 px-4 rounded-lg hover:bg-red-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 font-semibold">
                                    Añadir al Carrito
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $productos->links() }}
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm p-6 text-center text-gray-600 mb-10 border border-gray-100">
                <p class="text-lg font-medium">Este negocio aún no tiene productos registrados.</p>
            </div>
        @endif
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Reseñas</h2>
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @elseif (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @auth
            @if ($negocio->user_id !== auth()->user()->id)
                @if ($comentarioUsuario)
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-800">
                                    Ya has comentado anteriormente
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Asegúrate de que esta lógica sea correcta, auth()->user()->negocios->id no siempre es el ID del usuario --}}
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Deja tu comentario</h3>
                        <form action="{{ route('comentario.store') }}" method="POST" novalidate>
                            @csrf
                            <input type="hidden" id="negocio_id" name="negocio_id" value="{{ $negocio->id }}">
                            <div class="mb-4">
                                <label for="comentario" class="sr-only">Tu Comentario</label>
                                <textarea id="comentario" name="comentario" rows="4"
                                    class="w-full px-4 py-2 border rounded-lg
                                focus:ring-red-500 focus:border-red-500 text-gray-700 placeholder-gray-400 text-sm
                                @error('comentario')
                                    border-red-500
                                @enderror"
                                    placeholder="Escribe tu comentario aquí..." required></textarea>
                                @error('comentario')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4 flex items-center">
                                <label for="rating" class="block text-sm font-medium text-gray-700 mr-3">Tu
                                    Valoración:</label>
                                <div class="flex space-x-1" id="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"
                                            data-rating="{{ $i }}"></i>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating" value="0">
                                @error('rating')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="bg-red-700 text-white py-2.5 px-6 rounded-lg hover:bg-red-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 font-semibold text-sm">
                                Publicar Comentario
                            </button>
                        </form>
                    </div>
                @endif
            @else
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-800">
                                Eres el propietario de este negocio, no puedes dejar un comentario.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endauth

        @guest
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.506 2.723-1.506 3.488 0l.75 1.485.801 1.587A.75.75 0 0113.843 7.5h-7.686a.75.75 0 01.647-1.329l.801-1.587.75-1.485zM4.09 9.5a.75.75 0 01.75-.75h10.32a.75.75 0 01.75.75v5.5a.75.75 0 01-.75.75H4.84a.75.75 0 01-.75-.75v-5.5zm11.16 2.5a.75.75 0 01-.75-.75V11a.75.75 0 00-1.5 0v.25a.75.75 0 01-.75.75h-.25a.75.75 0 000 1.5h.25a.75.75 0 01.75.75v.25a.75.75 0 001.5 0v-.25a.75.75 0 01.75-.75h.25a.75.75 0 000-1.5h-.25zM12.5 11a.75.75 0 01-.75-.75V11a.75.75 0 00-1.5 0v.25a.75.75 0 01-.75.75H11a.75.75 0 000 1.5h.25a.75.75 0 01.75.75v.25a.75.75 0 001.5 0v-.25a.75.75 0 01.75-.75h.25a.75.75 0 000-1.5h-.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-800">
                            Necesitas <a href="{{ route('login') }}"
                                class="font-medium underline text-yellow-800 hover:text-yellow-900">iniciar sesión</a> para
                            dejar un comentario.
                        </p>
                    </div>
                </div>
            @endguest

            <div class="space-y-6">
                @if ($negocio->comentarios->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($negocio->comentarios as $comentario)
                            <div
                                class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center mb-3">
                                        <img src="{{ $comentario->usuarios->imagen ? asset('profiles/' . $comentario->usuarios->imagen) : asset('assets/images/default-profile.png') }}"
                                            alt="Avatar de Usuario" class="w-12 h-12 rounded-full mr-4 object-cover">
                                        <div>
                                            <a href="{{ route('post.index', $comentario->usuarios->username) }}"
                                                class="font-semibold text-gray-800 text-lg">
                                                {{ $comentario->usuarios->name }}</a>
                                            <div class="flex items-center text-sm text-gray-600">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="bi {{ $i <= $comentario->rating ? 'bi-star-fill' : 'bi-star' }} text-yellow-400 text-base mr-1"></i>
                                                @endfor
                                                <span
                                                    class="ml-2 text-gray-500 text-xs">{{ $comentario->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 text-base leading-relaxed mt-4">
                                        {{ $comentario->comentario }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-xl shadow-sm p-6 text-center text-gray-600 border border-gray-100">
                        <p class="text-lg font-medium">Sé el primero en dejar un comentario para este negocio.</p>
                    </div>
                @endif

                {{-- Aquí iría la paginación de comentarios si fuera necesario (si usas paginación en el controlador) --}}
                {{-- <div class="mt-6 text-center">
                        {{ $negocio->comentarios->links() }}
                    </div> --}}
            </div>
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
    @endsection

    @push('scripts')
        {{-- Script para manejar la selección de estrellas y enviar el rating --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const starRatingContainer = document.getElementById('star-rating');
                const ratingInput = document.getElementById('rating');

                if (starRatingContainer && ratingInput) {
                    const stars = starRatingContainer.querySelectorAll('.bi-star, .bi-star-fill');

                    const updateStars = (selectedRating) => {
                        stars.forEach((star, index) => {
                            if (index < selectedRating) {
                                star.classList.remove('bi-star');
                                star.classList.add('bi-star-fill');
                            } else {
                                star.classList.remove('bi-star-fill');
                                star.classList.add('bi-star');
                            }
                        });
                    };

                    // Inicializar las estrellas si ya hay un valor
                    updateStars(parseInt(ratingInput.value));

                    stars.forEach(star => {
                        star.addEventListener('click', () => {
                            const newRating = parseInt(star.dataset.rating);
                            ratingInput.value = newRating;
                            updateStars(newRating);
                        });

                        star.addEventListener('mouseover', () => {
                            const hoverRating = parseInt(star.dataset.rating);
                            updateStars(hoverRating);
                        });

                        star.addEventListener('mouseout', () => {
                            const currentRating = parseInt(ratingInput.value);
                            updateStars(currentRating);
                        });
                    });
                }
            });
        </script>
    @endpush
