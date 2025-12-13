<div>
    @if ($negocio !== null)

        @if (!$productos && empty($search))
            <div class="text-center py-16 px-6">
            </div>
        @else
            <div class="overflow-x-auto min-h-[500px]">
                <table class="min-w-full divide-y divide-gray-200 align-middle">
                    <thead class="bg-gray-50/80 backdrop-blur-sm sticky top-0 z-10">
                        <tr>
                            <th scope="col"
                                class="pl-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-1/3">
                                Producto
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Precio / Unidad
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Disponibilidad
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Estado Oferta
                            </th>
                            <th scope="col"
                                class="pr-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($productos as $producto)
                            <tr class="hover:bg-indigo-50/40 transition-all duration-200 group">

                                <td class="pl-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-14 w-14 relative group-hover:scale-105 transition-transform">
                                            @if ($producto->imagen)
                                                <img class="h-14 w-14 rounded-lg object-cover border border-gray-200 shadow-sm"
                                                    src="{{ asset('storage/productos/' . $producto->imagen) }}"
                                                    alt="{{ $producto->nombre }}">
                                            @else
                                                <div
                                                    class="h-14 w-14 rounded-lg bg-gray-100 flex items-center justify-center border border-gray-200">
                                                    <svg class="h-6 w-6 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="ml-4 max-w-xs">
                                            <div class="text-sm font-bold text-gray-900 truncate"
                                                title="{{ $producto->nombre }}">
                                                {{ $producto->nombre }}
                                            </div>
                                            <div class="text-xs text-gray-500 truncate mt-0.5 max-w-[200px]"
                                                title="{{ $producto->descripcion ?? 'Sin descripción' }}">
                                                {{ $producto->descripcion ?? 'Sin descripción detallada' }}
                                            </div>
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-gray-100 text-gray-800 mt-1">
                                                ID: {{ $producto->id }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-900">
                                            S./ {{ number_format($producto->precio, 2) }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            por {{ strtolower($producto->unidad ?? 'unidad') }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($producto->stock > 10)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor"
                                                viewBox="0 0 8 8">
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            En Stock ({{ $producto->stock }})
                                        </span>
                                    @elseif($producto->stock > 0)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-400" fill="currentColor"
                                                viewBox="0 0 8 8">
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            Bajo ({{ $producto->stock }})
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-400" fill="currentColor"
                                                viewBox="0 0 8 8">
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            Agotado
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($producto->precio_oferta)
                                        <div class="flex flex-col items-center">
                                            <span
                                                class="text-sm font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded border border-red-100">
                                                S./ {{ number_format($producto->precio_oferta, 2) }}
                                            </span>

                                        </div>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif
                                </td>

                                <td class="pr-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 text-gray-400 group-hover:text-gray-600">

                                        <a href="{{ route('producto.show', $producto->nombre) }}"
                                            class="p-2 rounded-lg hover:bg-green-50 hover:text-green-600 transition-colors tooltip"
                                            title="Ver detalles">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('producto.edit', $producto->nombre) }}"
                                            class="p-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-colors"
                                            title="Editar">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <div class="h-4 w-px bg-gray-200 mx-1"></div>

                                        <button
                                            wire:click="$dispatch('mostrarAlerta',{ producto: {{ $producto }} })"
                                            class="p-2 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors"
                                            title="Eliminar">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div
                                        class="mx-auto h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="h-8 w-8 text-gray-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-base font-medium text-gray-900">Sin coincidencias</h3>
                                    <p class="mt-1 text-sm text-gray-500">
                                        No encontramos productos para tu búsqueda. Intenta con otro término.
                                    </p>

                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50/50">
                {{ $productos->links(data: ['scrollTo' => false]) }}
            </div>
        @endif
    @else
        <x-sin-negocio />
    @endif
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (producto) => {
                Swal.fire({
                    title: "¿Está seguro?",
                    text: "Un producto eliminado no se puede recuperar.",
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
