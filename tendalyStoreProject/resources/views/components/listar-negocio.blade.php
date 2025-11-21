@if ($negocios->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($negocios as $negocio)
            <div
                class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-300 flex flex-col h-full">

                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('/storage/negocios/' . $negocio->imagen) }}" alt="{{ $negocio->nombre }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60">
                    </div>

                    <span
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur-md text-[var(--color-primary)] text-xs font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-wide">
                        {{ $negocio->categoria->nombre }}
                    </span>

                    <div
                        class="absolute bottom-4 right-4 flex items-center bg-gray-900/80 backdrop-blur-sm px-2 py-1 rounded-lg text-white text-xs font-bold shadow-lg">
                        <span class="mr-1">{{ number_format($negocio->comentarios->avg('rating'), 1) }}</span>
                        <i class="bi bi-star-fill text-yellow-400"></i>
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <div class="mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3
                                class="text-xl font-bold text-gray-800 group-hover:text-[var(--color-primary)] transition-colors line-clamp-1">
                                {{ $negocio->nombre }}
                            </h3>
                        </div>

                        <div class="flex items-center text-gray-400 text-xs font-medium mb-3">
                            <i class="bi bi-geo-alt-fill mr-1 text-red-500"></i>
                            <span>Lima, Perú</span>
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            {{ $negocio->descripcion }}
                        </p>
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                        <a href="{{ route('negocio.show', $negocio->nombre) }}"
                            class="w-full text-center bg-white border border-gray-200 text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 font-semibold py-2.5 rounded-lg transition-all duration-200 group-hover:shadow-md flex justify-center items-center gap-2">
                            Ver detalles <i
                                class="bi bi-arrow-right transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div
        class="flex flex-col items-center justify-center py-16 bg-white rounded-xl border border-dashed border-gray-300 text-center w-full col-span-full">
        <div class="bg-gray-50 p-4 rounded-full mb-4">
            <i class="bi bi-inbox text-4xl text-gray-400"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-700">No se encontraron negocios</h3>
        <p class="text-gray-500 text-sm mt-1">Intenta cambiar los filtros de búsqueda.</p>
    </div>
@endif
