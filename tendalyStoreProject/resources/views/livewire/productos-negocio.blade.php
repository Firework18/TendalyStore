<div id="productos-lista" wire:ignore.self class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
        @if ($productos->count())
            <div class="mb-12">
                <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b border-gray-200 pb-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Nuestros Productos</h2>
                        <p class="text-gray-500 mt-1">Calidad y sostenibilidad en cada detalle</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 xl:gap-8">
                    @foreach ($productos as $producto)
                        <div
                            class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl hover:border-gray-200 transition-all duration-300 flex flex-col h-full relative">

                            <div class="relative aspect-[4/3] overflow-hidden rounded-t-2xl bg-gray-100">
                                <!-- Link en la imagen para UX -->
                                <a href="{{ route('producto.show', $producto) }}" class="block w-full h-full">
                                    <img src="{{ asset('storage/productos/' . $producto->imagen) }}"
                                        alt="{{ $producto->nombre }}"
                                        class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110 {{ $producto->stock <= 0 ? 'grayscale opacity-60' : '' }}">
                                </a>

                                @if ($producto->stock > 0 && $producto->precio_oferta && $producto->precio_oferta < $producto->precio)
                                    <span
                                        class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-wider shadow-sm">
                                        Oferta
                                    </span>
                                @endif

                                @if ($producto->stock <= 0)
                                    <div class="absolute inset-0 flex items-center justify-center bg-gray-900/10">
                                        <span
                                            class="bg-gray-800 text-white text-xs font-bold px-3 py-1 rounded shadow-md">
                                            AGOTADO
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-5 flex flex-col flex-1">
                                <h3
                                    class="font-bold text-gray-800 text-lg mb-2 leading-tight group-hover:text-red-700 transition-colors">
                                    <a href="{{ route('producto.show', $producto) }}">
                                        {{ $producto->nombre }}
                                    </a>
                                </h3>

                                <p class="text-gray-500 text-sm mb-4 line-clamp-2 flex-1">
                                    {{ Str::limit($producto->descripcion, 60) }}
                                </p>
                                <div class="mt-auto pt-4 border-t border-dashed border-gray-200">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex flex-col">
                                            @if ($producto->stock > 0)
                                                @if ($producto->precio_oferta && $producto->precio_oferta < $producto->precio)
                                                    <span
                                                        class="text-xs text-gray-400 line-through decoration-red-400">S/.{{ number_format($producto->precio, 2) }}</span>
                                                    <span
                                                        class="text-xl font-extrabold text-red-500">S/.{{ number_format($producto->precio_oferta, 2) }}</span>
                                                @else
                                                    <span class="text-xs text-transparent">.</span>
                                                    <span
                                                        class="text-xl font-extrabold text-gray-900">S/.{{ number_format($producto->precio, 2) }}</span>
                                                @endif
                                            @else
                                                <span class="text-xs text-transparent">.</span>
                                                <span class="text-lg font-bold text-gray-400">No disponible</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if ($producto->stock > 0)
                                        <a href="{{ route('producto.show', $producto) }}"
                                            class="block w-full py-2.5 px-4 bg-white border-2 border-red-600 text-red-700 font-bold text-sm rounded-xl text-center hover:bg-red-600 hover:text-white transition-all duration-200 shadow-sm hover:shadow-md group-hover:bg-red-600 group-hover:text-white">
                                            Ver Detalles
                                        </a>
                                    @else
                                        <button disabled
                                            class="w-full py-2.5 px-4 bg-gray-100 text-gray-400 font-bold text-sm rounded-xl cursor-not-allowed">
                                            Sin Stock
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-10">
                    {{ $productos->links(data: ['scrollTo' => false]) }}
                </div>
            </div>
        @else
            <div
                class="flex flex-col items-center justify-center py-16 px-4 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 text-center">
                <div class="bg-white p-4 rounded-full shadow-sm mb-4">
                    <i class="bi bi-box-seam text-4xl text-gray-300"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">No hay productos disponibles</h3>
                <p class="text-gray-500 mt-1 max-w-sm">Este negocio está actualizando su catálogo. Vuelve a visitarnos
                    pronto.</p>
            </div>
        @endif
    </div>
</div>
