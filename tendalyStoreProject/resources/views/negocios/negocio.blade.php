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
                    <span class="font-semibold">4.9</span> <span class="text-gray-500 ml-1">(282 reseñas)</span>
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
                        <p class="flex items-center"><i class="bi bi-whatsapp mr-3 text-base text-green-600"></i>991 967 654
                        </p>
                        <p class="flex items-center"><i
                                class="bi bi-globe mr-3 text-base text-blue-600"></i>www.pachamama.pe</p>
                        <p class="flex items-center"><i
                                class="bi bi-envelope mr-3 text-base text-red-600"></i>info@pachamama.pe</p>
                        <p class="flex items-center"><i class="bi bi-geo-alt-fill mr-3 text-base text-gray-500"></i>Av.
                            Arequipa 4520,
                            Miraflores, Lima</p>
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
                    <div class="hidden md:flex space-x-3">
                        <button
                            class="p-2.5 rounded-full border border-gray-200 text-gray-600 hover:bg-gray-100 transition duration-200"><i
                                class="bi bi-chevron-left text-base"></i></button>
                        <button
                            class="p-2.5 rounded-full border border-gray-200 text-gray-600 hover:bg-gray-100 transition duration-200"><i
                                class="bi bi-chevron-right text-base"></i></button>
                    </div>
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

                                <div class="flex items-center text-sm mb-4">
                                    <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                                    <span class="text-gray-700 font-semibold mr-1">4.5</span>
                                    <span class="text-gray-400">(120)</span>
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

    {{-- Nueva Sección de Comentarios --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Comentarios</h2>

        {{-- Formulario para añadir un nuevo comentario --}}
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Deja tu comentario</h3>
            <form action="#" method="POST"> {{-- 'action' y 'method' son placeholders --}}
                @csrf
                <div class="mb-4">
                    <label for="comment" class="sr-only">Tu Comentario</label>
                    <textarea id="comment" name="comment" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-700 placeholder-gray-400 text-sm"
                        placeholder="Escribe tu comentario aquí..." required></textarea>
                </div>
                <div class="mb-4 flex items-center">
                    <label for="rating" class="block text-sm font-medium text-gray-700 mr-3">Tu Valoración:</label>
                    <div class="flex space-x-1">
                        {{-- Estrellas de valoración interactivas (solo diseño) --}}
                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                        <i class="bi bi-star text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                    </div>
                    <input type="hidden" name="rating" id="rating" value="0"> {{-- Campo oculto para la valoración --}}
                </div>
                <button type="submit"
                    class="bg-red-700 text-white py-2.5 px-6 rounded-lg hover:bg-red-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 font-semibold text-sm">
                    Publicar Comentario
                </button>
            </form>
        </div>

        {{-- Lista de comentarios existentes --}}
        <div class="space-y-6">
            {{-- Comentario 1 --}}
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center mb-3">
                    <img src="https://via.placeholder.com/40" alt="Avatar de Usuario"
                        class="w-10 h-10 rounded-full mr-4 object-cover">
                    <div>
                        <p class="font-semibold text-gray-800">Ana García</p>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star text-yellow-400 mr-1"></i>
                            <span class="ml-2 text-gray-500 text-xs">Hace 2 días</span>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 text-base leading-relaxed">
                    ¡Excelente atención y productos de muy buena calidad! Me encantó el aceite de coco. ¡Totalmente
                    recomendado!
                </p>
            </div>

            {{-- Comentario 2 --}}
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center mb-3">
                    <img src="https://via.placeholder.com/40" alt="Avatar de Usuario"
                        class="w-10 h-10 rounded-full mr-4 object-cover">
                    <div>
                        <p class="font-semibold text-gray-800">Carlos Mendoza</p>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <span class="ml-2 text-gray-500 text-xs">Hace 1 semana</span>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 text-base leading-relaxed">
                    Siempre encuentro lo que busco aquí. Los productos orgánicos son fantásticos y el servicio al cliente
                    es de primera.
                </p>
            </div>

            {{-- Comentario 3 --}}
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center mb-3">
                    <img src="https://via.placeholder.com/40" alt="Avatar de Usuario"
                        class="w-10 h-10 rounded-full mr-4 object-cover">
                    <div>
                        <p class="font-semibold text-gray-800">Sofía Ramos</p>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star-fill text-yellow-400 mr-1"></i>
                            <i class="bi bi-star text-yellow-400 mr-1"></i>
                            <i class="bi bi-star text-yellow-400 mr-1"></i>
                            <span class="ml-2 text-gray-500 text-xs">Hace 3 semanas</span>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 text-base leading-relaxed">
                    Los productos son buenos, aunque el envío tardó un poco más de lo esperado. Me gustaría ver más opciones
                    de entrega.
                </p>
            </div>

            {{-- Aquí iría la paginación de comentarios si fuera necesario --}}
            <div class="mt-6 text-center">
                <button
                    class="bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition duration-200 font-semibold text-sm">Cargar
                    más comentarios</button>
            </div>
        </div>
    </div>

    {{-- Sección Negocios Similares --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Negocios Similares</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 xl:gap-8">
            <a href="#"
                class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                <img src="{{ asset('assets/images/logo_amazonia_verde.webp') }}" alt="Logo Amazonia Verde"
                    class="w-28 h-28 object-contain mb-3 rounded-full border border-gray-200 p-2 shadow-sm">
                <h3 class="font-semibold text-gray-800 text-base">Amazonia Verde</h3>
            </a>

            <a href="#"
                class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                <img src="{{ asset('assets/images/logo_spa_amazonico.webp') }}" alt="Logo SPA Amazónico"
                    class="w-28 h-28 object-contain mb-3 rounded-full border border-gray-200 p-2 shadow-sm">
                <h3 class="font-semibold text-gray-800 text-base">SPA Amazónico</h3>
            </a>

            <a href="#"
                class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                <img src="{{ asset('assets/images/logo_botanika_natural.webp') }}" alt="Logo Botanika Natural"
                    class="w-28 h-28 object-contain mb-3 rounded-full border border-gray-200 p-2 shadow-sm">
                <h3 class="font-semibold text-gray-800 text-base">Botanika Natural</h3>
            </a>

            <a href="#"
                class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                <img src="{{ asset('assets/images/logo_negocio_similar_4.webp') }}" alt="Logo El Jardín Orgánico"
                    class="w-28 h-28 object-contain mb-3 rounded-full border border-gray-200 p-2 shadow-sm">
                <h3 class="font-semibold text-gray-800 text-base">El Jardín Orgánico</h3>
            </a>

            <a href="#"
                class="bg-white rounded-xl shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow duration-300 transform hover:-translate-y-1">
                <img src="{{ asset('assets/images/logo_negocio_similar_5.webp') }}" alt="Logo Sabor Andino"
                    class="w-28 h-28 object-contain mb-3 rounded-full border border-gray-200 p-2 shadow-sm">
                <h3 class="font-semibold text-gray-800 text-base">Sabor Andino</h3>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Script básico para manejar la selección de estrellas (solo frontend) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll(
                '.mb-4.flex.items-center .bi-star, .mb-4.flex.items-center .bi-star-fill');
            const ratingInput = document.getElementById('rating');

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    ratingInput.value = index + 1;
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        } else {
                            s.classList.remove('bi-star-fill');
                            s.classList.add('bi-star');
                        }
                    });
                });

                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        } else {
                            s.classList.remove('bi-star-fill');
                            s.classList.add('bi-star');
                        }
                    });
                });

                star.addEventListener('mouseout', () => {
                    // Restaura al valor actual si no se ha hecho clic
                    const currentRating = parseInt(ratingInput.value);
                    stars.forEach((s, i) => {
                        if (i < currentRating) {
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        } else {
                            s.classList.remove('bi-star-fill');
                            s.classList.add('bi-star');
                        }
                    });
                });
            });
        });
    </script>
@endpush
