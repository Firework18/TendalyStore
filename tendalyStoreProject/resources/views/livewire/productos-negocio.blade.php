<div id="productos-lista" wire:ignore.self>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10">
    @if ($productos->count())
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
                                Ver más
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $productos->links(data:['scrollTo'=>false]) }}
            </div>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm p-6 text-center text-gray-600 mb-10 border border-gray-100">
            <p class="text-lg font-medium">Este negocio aún no tiene productos registrados.</p>
        </div>
    @endif
</div>
</div>

