@extends('layouts.app')
@section('titulo', 'Catálogo de Econegocios y Bionegocios')

@section('contenido')
    <main class="min-h-screen pb-12">
        <section id="hero"
            class="hero-section relative h-96 md:h-[200px] flex items-center justify-center text-center bg-cover bg-center"
            style="
          background-image: url('{{ asset('assets/images/fondo_evea-1024x682.jpg') }}');
          background-color: rgba(88, 130, 182, 0.863);
          background-blend-mode: multiply;
        ">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="relative z-10 p-4 md:p-8">
                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6">
                    Catálogo de <br class="md:hidden" />
                    <span class="text-[var(--accent-yellow)]">Econegocios</span> y
                    <span class="text-[var(--accent-yellow)]">Bionegocios</span>
                </h1>
                <p class="text-lg md:text-xl text-white font-light">Descubre emprendimientos sostenibles que transforman el
                    Perú</p>

            </div>
        </section>
        <!-- Barra de búsqueda y filtros -->
        <div class="bg-white py-8 px-4 md:px-8 shadow-md  top-20 z-30 border-b border-gray-200">
            <div
                class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-6">
                <div class="flex-1 w-full md:w-auto">
                    <label for="search-input" class="sr-only">Buscar productos...</label>
                    <div class="relative flex">
                        <input type="search" id="search-input" placeholder="Buscar negocio, productos, ubicación..."
                            class="w-full p-3 border-2 border-gray-300 rounded-l-lg focus:outline-none focus:border-[var(--color-primary)] transition pl-10" />
                        <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <button
                            class="bg-[var(--color-primary)] text-white p-3 rounded-r-lg hover:bg-[#a93226] transition flex items-center justify-center">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-auto flex items-center space-x-2">
                    <label for="category-select" class="text-gray-700 text-sm md:text-base whitespace-nowrap">Todas las
                        categorías:</label>
                    <select id="category-select"
                        class="p-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[var(--color-primary)] transition flex-1">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ old('categoria_negocio_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Cuadrícula de Productos -->
        <div class="max-w-6xl mx-auto px-4 md:px-8 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <x-listar-negocio :negocios="$negocios"></x-listar-negocio>

        </div>

        <div class="mt-6">
            {{ $negocios->links() }}
        </div>

    </main>
@endsection
</body>

</html>
