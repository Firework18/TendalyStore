<div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr
                    class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                    <th class="px-6 py-4">Pedido / Fecha</th>
                    <th class="px-6 py-4">Negocio</th>
                    <th class="px-6 py-4">Total</th>
                    <th class="px-6 py-4 text-center">Estado</th>
                    <th class="px-6 py-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($misOrdenes as $orden)
                    <tr class="hover:bg-gray-50/80 transition-colors group">

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-900 font-mono">#{{ $orden->codigo }}</span>
                                <span class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $orden->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-8 w-8 rounded bg-indigo-50 flex items-center justify-center text-indigo-600 flex-shrink-0">
                                    <img src="{{ asset('storage/negocios/' . $orden->negocio->imagen) }}"
                                        alt="">
                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="text-sm font-medium text-gray-900">{{ $orden->negocio->nombre ?? 'Tienda General' }}</span>
                                    <span class="text-xs text-gray-400">
                                        {{ $orden->items->count() }} artículo(s)
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-bold text-gray-900">
                                ${{ number_format($orden->total, 2) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium border {{ $orden->tags->first()->color }}">
                                {{ ucfirst($orden->tags->first()->nombre) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end gap-2">

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
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="mx-auto h-12 w-12 text-gray-300 mb-3">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-sm font-medium text-gray-900">Sin historial</h3>
                            <p class="mt-1 text-sm text-gray-500">No se encontraron pedidos realizados.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        {{ $misOrdenes->links(data: ['scrollTo' => false]) }}
    </div>

</div>
