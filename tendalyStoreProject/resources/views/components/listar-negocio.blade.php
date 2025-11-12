@if ($negocios->count())
    @foreach ($negocios as $negocio)
        <div
            class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transform transition-transform duration-200 hover:scale-105">
            <div class="relative">
                <img src={{ asset('/uploads/' . $negocio->imagen) }} alt="EcoFresh Orgánicos"
                    class="w-full h-48 object-cover">
                <span
                    class="absolute top-3 left-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $negocio->categoria->nombre }}</span>
                <span
                    class="absolute top-3 right-3 bg-gray-900 bg-opacity-75 text-white text-sm font-bold px-2 py-1 rounded-md">{{ number_format($negocio->comentarios->avg('rating'), 1) }}
                    <i class="bi bi-star-fill text-yellow-400 text-xs"></i></span>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">{{ $negocio->nombre }}</h3>
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $negocio->descripcion }}</p>
                <p class="text-gray-500 text-xs mb-4">Desde: Lima, Perú</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('negocio.show', $negocio->nombre) }}"
                        class="px-4 py-2 bg-red-600 hover:bg-[#aa1e05] text-white text-sm font-semibold rounded-lg transition-colors duration-200 flex items-center space-x-2">
                        <span>Ver Negocio</span> <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="text-center">No hay negocios que mostrar por el momento</p>
@endif
