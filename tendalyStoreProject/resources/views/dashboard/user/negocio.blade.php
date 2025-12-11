@extends('dashboard.user.app')

@section('titulo', 'Mi Negocio')
@section('titulo_contenido', 'Panel de Control')
@section('primera_descripcion', 'Resumen general de tu tienda, inventario y últimas ventas.')

@section('contenido')

    @if (!$negocio)
        <x-sin-negocio />
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <div class="lg:col-span-2 flex flex-col gap-6">

                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="relative h-24 bg-gradient-to-r from-red-600 to-red-800">
                        <div class="absolute -bottom-10 left-6">
                            <div class="h-20 w-20 rounded-xl bg-white p-1 shadow-lg">
                                <img src="{{ asset('storage/negocios/' . $negocio->imagen) }}"
                                    class="h-full w-full bg-gray-100 rounded-lg flex items-center justify-center"
                                    alt="">
                            </div>
                        </div>
                    </div>

                    <div class="pt-12 px-6 pb-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $negocio->nombre }}</h2>
                                <p class="text-gray-500 text-sm mt-1 max-w-lg">
                                    {{ $negocio->descripcion ?? 'Sin descripción definida.' }}</p>
                            </div>

                        </div>

                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-full text-red-500 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-bold">Contacto</p>
                                    <p class="text-sm font-medium text-gray-700">{{ $negocio->correo }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-full text-red-500 shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase font-bold">Ubicación</p>
                                    <p class="text-sm font-medium text-gray-700">
                                        {{ $negocio->distrito->nombre ?? 'N/A' }},
                                        {{ $negocio->departamento->nombre ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-6">
                            <a href="{{ route('negocio.edit', $negocio->nombre) }}"
                                class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 rounded-lg transition text-center shadow-sm text-sm">
                                Editar Datos
                            </a>
                            <a href="{{ route('negocio.show', $negocio->nombre) }}" target="_blank"
                                class="flex-1 bg-gray-900 hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition text-center flex justify-center items-center text-sm gap-2">
                                <span>Ver Tienda Online</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-all">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider">Inventario</h3>
                        <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>

                    @if ($negocio->productos->isEmpty())
                        <div class="text-center py-4">
                            <p class="text-sm text-gray-500 mb-3">No tienes productos aún.</p>
                            <a href="{{ route('producto.create') }}"
                                class="text-red-600 font-semibold text-sm hover:underline">Crear el primero &rarr;</a>
                        </div>
                    @else
                        <div class="flex items-end gap-2 mb-4">
                            <span class="text-4xl font-black text-gray-800">{{ $negocio->productos->count() }}</span>
                            <span class="text-gray-500 font-medium mb-1">Productos</span>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('dashboard.producto') }}"
                                class="block text-center w-full bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold py-2 rounded-lg text-xs transition">
                                Ver Catálogo
                            </a>
                            <a href="{{ route('producto.create') }}"
                                class="block text-center w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded-lg text-xs transition">
                                + Agregar
                            </a>
                        </div>
                    @endif
                </div>

                <div class="relative bg-gray-900 rounded-xl shadow-lg border border-gray-800 overflow-hidden group">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black opacity-100 group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="relative p-6">
                        <div class="flex items-center gap-3 mb-3 text-yellow-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <h3 class="font-bold text-white">Logística y Pagos</h3>
                        </div>
                        <p class="text-gray-400 text-xs mb-5 leading-relaxed">
                            Configura costos de envío, delivery gratis y métodos de pago (Yape, Plin, Efectivo).
                        </p>
                        <a href="{{ route('logistica.create') }}"
                            class="block w-full text-center bg-yellow-500 hover:bg-yellow-400 text-black font-bold py-2 rounded-lg text-sm transition shadow-lg">
                            Configurar Opciones
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
            <div
                class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50">
                <div class="flex items-center gap-3">
                    <div class="bg-red-100 p-2 rounded-lg text-red-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Últimas Ventas</h3>
                        <p class="text-xs text-gray-500">Mostrando las 5 órdenes más recientes</p>
                    </div>
                </div>

                <a href="{{ route('orden.negocio') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800 hover:underline flex items-center">
                    Ver historial completo
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Orden
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Cliente</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Total
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($ultimasOrdenes as $orden)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="font-mono text-sm font-bold text-gray-900">#{{ $orden->codigo ?? $orden->id }}</span>
                                    <div class="text-xs text-gray-400">{{ $orden->created_at->diffForHumans() }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $orden->usuario->name ?? 'Invitado' }}</div>
                                    <div class="text-xs text-gray-500">{{ $orden->telefono ?? 'N/A' }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full border {{ $orden->tags->first()->color }}">
                                        {{ $orden->tags->first()->nombre }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-gray-900">
                                    ${{ number_format($orden->total, 2) }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('orden.negocio.detalle', $orden->codigo) }}"
                                        class="text-indigo-600 hover:text-indigo-900 hover:bg-indigo-50 px-3 py-1 rounded transition">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                        <p>No hay ventas recientes para mostrar.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('negocio') || session('logistica'))
        <script>
            const msg = "{{ session('negocio') ?? session('logistica') }}";
            Swal.fire({
                icon: 'success',
                title: '¡Operación Exitosa!',
                text: msg,
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true,
                background: '#fff',
                iconColor: '#10B981',
                customClass: {
                    popup: 'shadow-xl border border-gray-100 rounded-lg'
                }
            });
        </script>
    @endif
@endpush
