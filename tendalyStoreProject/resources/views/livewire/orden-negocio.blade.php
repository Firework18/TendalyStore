<div class="space-y-6">

    @if ($negocio)

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">
                    {{ $negocio->nombre }} - Listado de Órdenes
                </h3>
                <span class="px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-700 rounded-full">
                    {{ $misVentas->total() }} Registros
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Orden</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Cliente</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Pago</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Estado</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($misVentas as $orden)
                            <tr class="hover:bg-gray-50 transition-colors" wire:key="orden-{{ $orden->id }}">
                                <td class="px-6 py-4 font-mono font-bold">#{{ $orden->codigo }}</td>
                                <td class="px-6 py-4">{{ $orden->usuario->name ?? 'Invitado' }}</td>

                                <td class="px-6 py-4 text-center">
                                    @if ($orden->imagen_pago)
                                        <button
                                            onclick="openImageModal('{{ asset('storage/pagos/' . $orden->imagen_pago) }}')"
                                            class="text-indigo-500 hover:text-indigo-700">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                    @else
                                        <span class="text-xs text-gray-300">N/A</span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block w-full max-w-[150px]">
                                        <div
                                            class="inline-flex items-center w-full px-3 py-1 rounded-full text-xs font-bold border justify-between {{ $orden->tags->first()->color }}">
                                            <span>{{ $orden->tags->first()->nombre }}</span>
                                            <select
                                                wire:change="cambiarEstado({{ $orden->id }}, $event.target.value)"
                                                class="absolute inset-0 w-full opacity-0 cursor-pointer">
                                                @foreach ($estadosDisponibles as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        {{ $tagId == $tag->id ? 'selected' : '' }}>
                                                        {{ ucfirst($tag->nombre) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center font-bold">${{ number_format($orden->total, 2) }}</td>

                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('orden.cliente.detalle', $orden->codigo) }}"
                                        class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                        <svg class="mr-1.5 w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Ver Detalle
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500">
                                    No tienes ventas registradas aún.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                {{ $misVentas->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    @else
        <x-sin-negocio />
    @endif

</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('estadoEditado', (data) => {
                Swal.fire({
                    icon: data.type,
                    title: data.message,
                    text: data.text,
                    showConfirmButton: true,
                    confirmButtonColor: "#d33",
                    timer: 2500,
                });
            });
        });
    </script>
@endpush
