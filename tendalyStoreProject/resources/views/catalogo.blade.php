@extends('layouts.app')
@section('titulo', 'Catálogo de Econegocios y Bionegocios')

@section('contenido')
<main class="min-h-screen pb-12">
    <!-- Hero de Catálogo -->
    <section
        id="hero"
        class="hero-section relative h-96 md:h-[200px] flex items-center justify-center text-center bg-cover bg-center"
        style="
          background-image: url('{{asset('assets/images/fondo_evea-1024x682.jpg')}}');
          background-color: rgba(88, 130, 182, 0.863);
          background-blend-mode: multiply;
        "
      >
<div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 p-4 md:p-8">
          <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
            Catálogo de <br class="md:hidden" />
            <span class="text-[var(--accent-yellow)]">Econegocios</span> y
            <span class="text-[var(--accent-yellow)]">Bionegocios</span>
          </h1>
          <p class="text-lg md:text-xl text-white font-light">Descubre emprendimientos sostenibles que transforman el Perú</p>
          
        </div>
      </section>
    <!-- Barra de búsqueda y filtros -->
    <div class="bg-white py-8 px-4 md:px-8 shadow-md sticky top-20 z-30 border-b border-gray-200">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-6">
            <div class="flex-1 w-full md:w-auto">
                <label for="search-input" class="sr-only">Buscar productos...</label>
                <div class="relative flex">
                    <input
                        type="search"
                        id="search-input"
                        placeholder="Buscar negocio, productos, ubicación..."
                        class="w-full p-3 border-2 border-gray-300 rounded-l-lg focus:outline-none focus:border-[var(--color-primary)] transition pl-10"
                    />
                    <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <button
                        class="bg-[var(--color-primary)] text-white p-3 rounded-r-lg hover:bg-[#a93226] transition flex items-center justify-center"
                    >
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="w-full md:w-auto flex items-center space-x-2">
                <label for="category-select" class="text-gray-700 text-sm md:text-base whitespace-nowrap">Todas las categorías:</label>
                <select id="category-select" class="p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[var(--color-primary)] transition flex-1">
                    <option value="">Selecciona una categoría</option>
                    <option value="alimentacion">Alimentación</option>
                    <option value="cosmetica">Cosmética y Bienestar</option>
                    <option value="ecoturismo">Ecoturismo</option>
                    <option value="energia">Energía Renovable</option>
                    <option value="moda">Moda Sostenible</option>
                    <option value="eficiencia">Eficiencia de Recursos</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Cuadrícula de Productos -->
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Tarjeta de Producto 1 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="EcoFresh Orgánicos" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Alimentación</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.9 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">EcoFresh Orgánicos</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Ofrecemos alimentos frescos y orgánicos, cultivados directamente, sin pesticidas ni químicos.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Lima, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 2 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Pachamama" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-purple-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Cosmética y Bienestar</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.8 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Pachamama</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Productos naturales elaborados con ingredientes andinos: Cremas, jabones y tratamientos faciales.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Cusco, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 3 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src="{{asset('assets/images/producto_catalogo.png')}}" alt="Aventuras Verdes" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Ecoturismo</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.5 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Aventuras Verdes</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Experiencias de turismo sostenible en la selva peruana. Paquetes ecoturísticos y aventuras responsables.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Madre de Dios, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 4 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Energía Limpia Perú" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Energía Renovable</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.7 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Energía Limpia Perú</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Soluciones de energía renovable para hogares y empresas. Paneles solares e infraestructura eólica.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Arequipa, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 5 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Moda Sostenible" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-pink-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Moda Sostenible</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.1 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Moda Sostenible</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Ropa elaborada con fibras naturales y procesos eco-amigables. Moda consciente y ética.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Cusco, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 6 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Agricultura Andina" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full">Alimentación</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.9 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Agricultura Andina</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Productos agrícolas orgánicos de los Andes. Cultivos tradicionales y sostenibles.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Huancayo, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 7 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Cosméticos del Amazonas" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-purple-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Cosmética y Bienestar</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.3 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Cosméticos del Amazonas</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Elaboración de productos con ingredientes de la selva peruana. Cuidado corporal y bienestar integral.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Tarapoto, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 8 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Reciclaje Innovador" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Eficiencia de Recursos</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.5 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Reciclaje Innovador</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Soluciones creativas para el reciclaje de residuos. Productos con valor añadido.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Chiclayo, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Producto 9 -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('assets/images/producto_catalogo.png')}} alt="Lodge Ecológico" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full">Ecoturismo</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.6 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">Lodge Ecológico</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">Alojamiento sostenible en plena naturaleza. Fomentando la conexión con el entorno ambiental.</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Iquitos, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="#" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Paginación -->
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-8 flex justify-center">
        <nav class="flex space-x-2" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Previous
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--color-primary)] border border-[var(--color-primary)] rounded-md hover:bg-[#a93226]">
                1
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                2
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                3
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Next
            </a>
        </nav>
    </div>


</main>
@endsection
  </body>
</html>