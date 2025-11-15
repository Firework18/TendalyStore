<div>
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tu Carrito de Compras</h1>
    
        @if (!$carrito || $carrito->items->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <p class="text-gray-600 text-lg mb-4">Tu carrito está vacío. ¡Añade algunos productos!</p>
                <a href="{{ route('catalogo') }}"
                    class="inline-block bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition duration-300">
                    Ir de Compras
                </a>
            </div>
        @else
            @foreach ($carrito->items->groupBy(fn($item) => $item->producto->negocio->nombre) as $negocioNombre => $itemsPorNegocio)
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6 border-b pb-4">{{ $negocioNombre }}</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach ($itemsPorNegocio as $item)
                            <div class="flex items-center space-x-4 border-b pb-4 mb-4 last:border-b-0 last:pb-0">
                                <img src="{{ asset('uploads/' . $item->producto->imagen) }}"
                                    alt="{{ $item->producto->nombre }}" class="w-20 h-20 object-cover rounded-md shadow-sm">

                                <div class="flex-grow">
                                    <h3 class="text-lg font-medium text-gray-800">{{ $item->producto->nombre }}</h3>
                                    <p class="text-gray-600 text-sm">Cantidad: {{ $item->cantidad }}</p>
                                    <p class="text-gray-600 text-sm">Precio Unitario: S/.
                                        {{ number_format($item->precio_unitario, 2) }}</p>
                                    <p class="text-red-600 font-bold mt-1">Subtotal: S/.
                                        {{ number_format($item->subtotal, 2) }}</p>
                                </div>

                                <div class="flex items-center space-x-2">
                                    {{-- Botones de acción (editar / eliminar) --}}
                                    <button class="text-gray-500 hover:text-blue-600 transition">
                                        <i class="bi bi-pencil-square text-xl"></i>
                                    </button>
                                    <button class="text-gray-500 hover:text-red-600 transition">
                                        <i class="bi bi-trash text-xl"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 pt-4 border-t flex justify-end">
                        <button
                            class="bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition duration-300">
                            Comprar de {{ $negocioNombre }}
                        </button>
                    </div>
                </div>
            @endforeach

            <div class="mt-10 text-right">
                @php
                    $totalCarrito = $carrito->items->sum('subtotal');
                @endphp
                <p class="text-2xl font-bold text-gray-800 mb-4">
                    Total del Carrito:
                    <span class="text-red-600">S/. {{ number_format($totalCarrito, 2) }}</span>
                </p>

            </div>
            @endif
</div>
