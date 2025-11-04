@extends('layouts.app') {{-- Asegúrate que tu layout principal se llama 'app.blade.php' --}}

@section('titulo', $negocio->nombre)

@section('contenido')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:mt-2"> {{-- Ajuste del margen superior para la cabecera fija --}}

    {{-- Navegación de vuelta --}}
    <div class="mb-5 flex items-center text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
        <i class="bi bi-chevron-left mr-1 text-base"></i>
        <a href="{{ url('/catalogo') }}" class="text-sm font-normal text-[#555]">Volver al catálogo</a>
    </div>

    {{-- Sección Principal del Producto/Empresa (Pachamama Info) --}}
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="md:flex">
            {{-- Columna Izquierda: Imagen Principal --}}
            <div class="md:w-1/2 relative">
                <img src="{{ asset('/uploads/' . $negocio->imagen) }}" alt="Productos Pachamama" class="w-full h-auto object-cover max-h-[480px]"> {{-- Altura máxima para la imagen --}}
                <div class="absolute top-4 left-4 bg-[#4CAF50] text-white text-xs font-semibold px-2.5 py-0.5 rounded-full tracking-wide">Ecoamigable</div>
                <div class="absolute top-4 right-4 flex space-x-2">
                    <button class="bg-white p-2 rounded-full shadow text-gray-700 hover:bg-gray-50 transition"><i class="bi bi-heart text-base"></i></button>
                    <button class="bg-white p-2 rounded-full shadow text-gray-700 hover:bg-gray-50 transition"><i class="bi bi-share text-base"></i></button>
                </div>
            </div>

            {{-- Columna Derecha: Información de la Empresa --}}
            <div class="md:w-1/2 p-6 md:p-8 flex flex-col justify-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">{{$negocio->nombre}}</h1>
                <div class="flex items-center mb-4 text-sm text-gray-600">
                    <i class="bi bi-star-fill text-yellow-500 mr-1 text-sm"></i>
                    <span>4.9 <span class="text-gray-500">(282 reseñas)</span></span>
                    <span class="mx-2 text-gray-300">|</span>
                    <i class="bi bi-geo-alt-fill mr-1 text-sm"></i>
                    <span>Lima, Perú</span>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed mb-6">
                    {{$negocio->descripcion}}
                </p>

                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Productos Amazónicos</span>
                    <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Comercio Justo</span>
                    <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Ingredientes Naturales</span>
                    <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">Sostenibilidad</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección "Sobre Nosotros" y "Información de Contacto" --}}
    <div class="bg-white rounded-lg shadow-md p-6 md:p-8 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Columna Izquierda: Descripción Larga --}}
            <div>
                <p class="text-gray-700 text-sm leading-relaxed mb-4">
                    {{$negocio->historia}}
                </p>
                
            </div>
            {{-- Columna Derecha: Información de Contacto --}}
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Información de Contacto</h3>
                <div class="space-y-2 text-gray-700 text-sm">
                    <p class="flex items-center"><i class="bi bi-whatsapp mr-2 text-base"></i>991 967 654</p>
                    <p class="flex items-center"><i class="bi bi-globe mr-2 text-base"></i>www.pachamama.pe</p>
                    <p class="flex items-center"><i class="bi bi-envelope mr-2 text-base"></i>info@pachamama.pe</p>
                    <p class="flex items-center"><i class="bi bi-geo-alt-fill mr-2 text-base"></i>Av. Arequipa 4520, Miraflores, Lima</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección "Nuestros Productos" --}}
    @if ($negocio->productos)
        <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Nuestros Productos</h2>
            <div class="flex space-x-2">
                <button class="p-2 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 transition"><i class="bi bi-chevron-left text-base"></i></button>
                <button class="p-2 rounded-full border border-gray-300 text-gray-600 hover:bg-gray-100 transition"><i class="bi bi-chevron-right text-base"></i></button>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ( $negocio->productos as $producto )
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow">
    <div class="relative">
        <img src="{{ asset('/uploads/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-40 object-cover"> {{-- Altura ajustada --}}
        <button class="absolute top-2 right-2 bg-white p-1.5 rounded-full text-gray-600 hover:text-red-500 transition"><i class="bi bi-heart text-sm"></i></button>
        {{-- Etiqueta de oferta, si aplica --}}
        @if($producto->precio_oferta && $producto->precio_oferta < $producto->precio)
            <span class="absolute bottom-2 left-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">Oferta</span>
        @endif
    </div>
    <div class="p-3"> 
        <h3 class="font-semibold text-gray-800 text-base mb-1">{{$producto->nombre}}</h3>
        <p class="text-gray-500 text-xs mb-2">{{$producto->descripcion}}</p> {{-- Asumiendo una categoría fija o que viene de $producto->categoria --}}
        
        {{-- Sección de Precios --}}
        <div class="flex items-baseline mb-2">
            @if($producto->precio_oferta && $producto->precio_oferta < $producto->precio)
                <span class="text-red-700 font-bold text-lg mr-2">S/.{{ number_format($producto->precio_oferta, 2) }}</span>
                <span class="text-gray-500 line-through text-sm">S/.{{ number_format($producto->precio, 2) }}</span>
            @else
                <span class="text-gray-800 font-bold text-lg">S/.{{ number_format($producto->precio, 2) }}</span>
            @endif
        </div>

        {{-- Valoración --}}
        <div class="flex items-center text-xs mb-3">
            <i class="bi bi-star-fill text-yellow-500 mr-0.5"></i>
            <span class="text-gray-700 mr-0.5">4.5</span> {{-- Asumiendo un valor fijo o que viene de $producto->rating --}}
            <span class="text-gray-400">(120)</span> {{-- Asumiendo un valor fijo o que viene de $producto->reviews_count --}}
        </div>

        {{-- Botón Añadir al Carrito --}}
        <button class="w-full bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
            Añadir al Carrito
        </button>
    </div>
</div>
            @endforeach

        </div>
    </div>
    @else

    

    @endif
    

    {{-- Sección "Negocios Similares" --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Negocios Similares</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            {{-- Negocio Similar 1: Amazonia Verde --}}
            <a href="#" class="bg-white rounded-lg shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow">
                <img src="{{ asset('assets/images/logo_amazonia_verde.webp') }}" alt="Logo Amazonia Verde" class="w-24 h-24 object-contain mb-3 rounded-full border border-gray-100 p-1">
                <h3 class="font-semibold text-gray-800 text-base">Amazonia Verde</h3>
            </a>
            {{-- Negocio Similar 2: SPA Amazónico --}}
            <a href="#" class="bg-white rounded-lg shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow">
                <img src="{{ asset('assets/images/logo_spa_amazonico.webp') }}" alt="Logo SPA Amazónico" class="w-24 h-24 object-contain mb-3 rounded-full border border-gray-100 p-1">
                <h3 class="font-semibold text-gray-800 text-base">SPA Amazónico</h3>
            </a>
            {{-- Negocio Similar 3: Botanika Natural --}}
            <a href="#" class="bg-white rounded-lg shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow">
                <img src="{{ asset('assets/images/logo_botanika_natural.webp') }}" alt="Logo Botanika Natural" class="w-24 h-24 object-contain mb-3 rounded-full border border-gray-100 p-1">
                <h3 class="font-semibold text-gray-800 text-base">Botanika Natural</h3>
            </a>
             {{-- Negocio Similar 4: Añadido para completar la fila, como en la imagen --}}
            <a href="#" class="bg-white rounded-lg shadow-sm p-4 flex flex-col items-center text-center border border-gray-100 hover:shadow-md transition-shadow">
                <img src="{{ asset('assets/images/logo_negocio_similar_4.webp') }}" alt="Logo Negocio Similar" class="w-24 h-24 object-contain mb-3 rounded-full border border-gray-100 p-1">
                <h3 class="font-semibold text-gray-800 text-base">El Jardín Orgánico</h3>
            </a>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    {{-- Aquí puedes añadir scripts específicos si los necesitas --}}
@endpush

</body>
</html>