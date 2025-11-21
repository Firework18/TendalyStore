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
        @foreach ($carrito->items->groupBy(fn($item) => $item->producto->negocio->nombre ?? 'Sin negocio') as $negocioNombre => $itemsPorNegocio)
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6 border-b pb-4">{{ $negocioNombre }}</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach ($itemsPorNegocio as $item)
                        <div class="flex items-center space-x-4 border-b pb-4 mb-4 last:border-b-0 last:pb-0">
                            <img src="{{ asset('/storage/productos/' . $item->producto->imagen) }}"
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
                                <button class="text-gray-500 hover:text-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green"
                                        class="size-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>

                                </button>
                                <button wire:click="$dispatch('mostrarAlerta',{ producto: {{ $item->producto }} })"
                                    class="text-gray-500 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                            clip-rule="evenodd" />
                                    </svg>

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
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (producto) => {
                Swal.fire({
                    title: "¿Está seguro?",
                    text: "El producto se eliminará del carrito de compras.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, elimínalo.",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar', producto);
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "El producto ha sido eliminado correctamente",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
