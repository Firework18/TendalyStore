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
        @foreach ($negocios as $negocio )
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{asset('/uploads/'. $negocio->imagen)}} alt="EcoFresh Orgánicos" class="w-full h-48 object-cover">
                <span class="absolute top-3 left-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">Alimentación</span>
                <span class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">4.9 <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">{{$negocio->nombre}}</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{$negocio->descripcion}}</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Lima, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="{{route('negocio.index',$negocio->nombre)}}" class="px-4 py-2 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        

        

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