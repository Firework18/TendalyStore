<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Tu Carrito de Compras</h1>
        @if ($carrito && !$carrito->items->isEmpty())
            <span class="bg-gray-100 text-gray-600 py-1 px-3 rounded-full text-sm font-medium">
                {{ $carrito->items->count() }} Productos
            </span>
        @endif
    </div>

    @if (!$carrito || $carrito->items->isEmpty())
        <div class="bg-white p-12 rounded-2xl shadow-sm border border-gray-100 text-center flex flex-col items-center">
            <div class="bg-red-50 p-4 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Tu carrito está vacío</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">Parece que aún no has añadido nada a tu carrito. Explora
                nuestro catálogo y encuentra los mejores productos.</p>
            <a href="{{ route('catalogo') }}"
                class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 md:py-3 md:text-lg md:px-10 transition duration-300 shadow-lg hover:shadow-red-500/30">
                Ir de Compras
            </a>
        </div>
    @else
        <div class="space-y-8">
            @foreach ($carrito->items->groupBy(fn($item) => $item->producto->negocio->nombre ?? 'Sin negocio') as $negocioNombre => $itemsPorNegocio)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center gap-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h2 class="text-lg font-bold text-gray-800">{{ $negocioNombre }}</h2>
                        </div>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Envío
                            calculado al
                            final</span>
                    </div>

                    <div class="divide-y divide-gray-100">
                        @foreach ($itemsPorNegocio as $item)
                            <div class="p-6 hover:bg-gray-50 transition duration-150 ease-in-out group">
                                <div class="flex flex-col sm:flex-row items-center gap-6">

                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('/storage/productos/' . $item->producto->imagen) }}"
                                            alt="{{ $item->producto->nombre }}"
                                            class="w-24 h-24 object-cover rounded-xl shadow-sm border border-gray-200">
                                    </div>

                                    <div class="flex-1 w-full text-center sm:text-left">
                                        <h3
                                            class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors">
                                            {{ $item->producto->nombre }}
                                        </h3>
                                        <p class="text-sm text-gray-500 mt-1">
                                            Unitario: <span class="font-medium text-gray-900">S/.
                                                {{ number_format($item->precio_unitario, 2) }}</span>
                                        </p>
                                    </div>

                                    <!-- Control de Cantidad con Alpine & Livewire -->
                                    <div class="flex flex-col items-center justify-center" x-data="{
                                        qty: {{ $item->cantidad }},
                                        loading: false,
                                        updateQty(val) {
                                            if (val < 1) return;
                                            this.qty = val;
                                            this.loading = true;
                                            $wire.actualizarCantidad({{ $item->id }}, val).then(() => {
                                                this.loading = false;
                                            });
                                        }
                                    }">

                                        <div
                                            class="flex items-center border border-gray-300 rounded-lg bg-white shadow-sm">
                                            <button @click="updateQty(qty - 1)" :disabled="qty <= 1 || loading"
                                                class="px-3 py-1 text-gray-600 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed rounded-l-lg transition">
                                                -
                                            </button>

                                            <input type="text" readonly x-model="qty"
                                                class="w-12 text-center text-sm font-semibold text-gray-700 border-none focus:ring-0 p-0 select-none bg-transparent">

                                            <button @click="updateQty(qty + 1)"
                                                :disabled="{{ $item->producto->stock }} <= qty || loading"
                                                class="px-3 py-1 text-gray-600 hover:bg-gray-100 disabled:opacity-50 rounded-r-lg transition">
                                                +
                                            </button>
                                        </div>
                                        <div class="h-4 mt-1">
                                            <span x-show="loading"
                                                class="text-xs text-red-500 animate-pulse">Actualizando...</span>
                                        </div>
                                    </div>

                                    <!-- Subtotal -->
                                    <div class="text-right min-w-[100px]">
                                        <p class="text-sm text-gray-500">Subtotal</p>
                                        <p class="text-lg font-bold text-red-600">
                                            S/. {{ number_format($item->subtotal, 2) }}
                                        </p>
                                    </div>

                                    <div>
                                        <button
                                            wire:click="$dispatch('mostrarAlerta',{ producto: {{ $item->producto }} })"
                                            class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-full transition duration-200"
                                            title="Eliminar producto">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div
                        class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row justify-end items-center gap-4 border-t border-gray-100">
                        <span class="hidden">{{ $subtotalNegocio = $itemsPorNegocio->sum('subtotal') }}</span>
                        <div class="text-gray-600 text-sm">
                            Subtotal {{ $negocioNombre }}: <span class="font-bold text-gray-900">S/.
                                {{ number_format($subtotalNegocio, 2) }}</span>
                        </div>
                        <button
                            class="w-full sm:w-auto bg-white border border-red-600 text-red-600 font-semibold py-2 px-6 rounded-lg hover:bg-red-600 hover:text-white transition duration-300 shadow-sm">
                            Comprar solo de {{ $negocioNombre }}
                        </button>
                    </div>
                </div>
            @endforeach

            <div
                class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 mt-8 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-500">Total a Pagar</h3>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <span class="hidden">{{ $totalCarrito = $carrito->items->sum('subtotal') }}</span>

                    <div class="text-3xl font-extrabold text-gray-900">
                        S/. {{ number_format($totalCarrito, 2) }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (producto) => {
                Swal.fire({
                    title: "¿Eliminar producto?",
                    text: "Se quitará " + producto.nombre + " de tu carrito.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#ef4444",
                    cancelButtonColor: "#9ca3af",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                    customClass: {
                        popup: 'rounded-xl',
                        confirmButton: 'rounded-lg px-6 py-2',
                        cancelButton: 'rounded-lg px-6 py-2'
                    }
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
