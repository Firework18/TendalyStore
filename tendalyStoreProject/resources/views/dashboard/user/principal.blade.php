@extends('dashboard.user.app')

@section('titulo', 'Inicio')

@section('titulo_contenido')
    <h1 class="text-3xl font-extrabold text-red-900 leading-tight">Tu Resumen</h1>
@endsection

@section('primera_descripcion')
    <p class="text-lg text-red-800 mb-6">
        ¡Bienvenido de nuevo, <span class="font-semibold">{{ $user->name }}</span>!
        Aquí tienes un resumen de tu actividad reciente.
        @if ($negocio)
            También puedes ver el rendimiento de <b>{{ $negocio->nombre }}</b> más abajo.
        @else
            Explora nuestros productos y ofertas especiales.
        @endif
    </p>
@endsection

@section('contenido')
    <div class="space-y-8">

        {{-- CLIENTE --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-red-600 to-red-900 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1 opacity-90">Pedidos en Curso</h3>
                    <p class="text-4xl font-bold">{{ $comprasActivas }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="size-10 opacity-80">
                    <path fill-rule="evenodd"
                        d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <div
                class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-red-900 mb-1">Última Compra</h3>
                    @if ($ultimaCompra)
                        <p class="text-3xl font-bold text-red-800">${{ number_format($ultimaCompra->total, 2) }}</p>
                        <p class="text-gray-600 text-sm mt-1">{{ $ultimaCompra->created_at->diffForHumans() }}</p>
                    @else
                        <p class="text-2xl font-bold text-gray-400">Sin compras</p>
                        <p class="text-gray-500 text-xs mt-1">¡Haz tu primer pedido hoy!</p>
                    @endif
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="size-10 opacity-80">
                    <path
                        d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-600 mb-8">
            <div class="flex justify-between items-center mb-4">

                <h3 class="text-xl font-semibold text-red-900 mb-4">Mis Últimos Pedidos</h3>
                <a href="{{ route('orden.cliente') }}"
                    class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors">Ver Pedidos
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-red-200">
                    <thead class="bg-red-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Orden</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Total</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-red-100">
                        @forelse ($misCompras as $compra)
                            @php
                                $tag = $compra->tags->first();
                                $colorClass = $tag ? $tag->color : 'bg-gray-100 text-gray-800';
                                $nombreEstado = $tag ? ucfirst($tag->nombre) : 'Pendiente';
                            @endphp
                            <tr class="hover:bg-red-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-bold font-mono">
                                    #{{ $compra->codigo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $compra->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">
                                    ${{ number_format($compra->total, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    <span
                                        class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full border {{ $colorClass }}">
                                        {{ $nombreEstado }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('orden.cliente.detalle', $compra->codigo) }}"
                                        class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                        Detalle</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    No has realizado compras recientemente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- NEGOCIO --}}

        @if ($negocio)
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h2 class="text-2xl font-bold text-red-900 mb-6 flex items-center gap-2">
                    <span class="bg-red-100 text-red-800 p-2 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </span>
                    Tu Negocio: {{ $negocio->nombre }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div
                        class="bg-gradient-to-br from-red-600 to-red-900 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                        <h3 class="text-lg font-semibold mb-2 opacity-90">Ingresos Totales</h3>
                        <p class="text-4xl font-bold">${{ number_format($statsNegocio['ingresos'], 2) }}</p>
                        <p class="text-red-200 text-xs mt-2">Histórico acumulado</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out">
                        <h3 class="text-lg font-semibold text-red-900 mb-2">Pedidos Pendientes</h3>
                        <p class="text-4xl font-bold text-red-800">{{ $statsNegocio['pedidos_nuevos'] }}</p>
                        <p class="text-gray-500 text-xs mt-2">Requieren tu atención</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out">
                        <h3 class="text-lg font-semibold text-red-900 mb-2">Total Órdenes</h3>
                        <p class="text-4xl font-bold text-red-800">{{ $statsNegocio['total_ventas'] }}</p>
                        <p class="text-gray-500 text-xs mt-2">Órdenes recibidas</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-600 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-red-900">Ventas Recientes del Negocio</h3>
                        <a href="{{ route('orden.negocio') }}"
                            class="text-sm text-red-600 hover:text-red-800 font-medium transition-colors">Gestionar
                            Ordenes</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-red-200">
                            <thead class="bg-red-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                        Orden</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                        Cliente</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                        Total</th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-semibold text-red-700 uppercase tracking-wider">
                                        Estado</th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-semibold text-red-700 uppercase tracking-wider">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-red-100">
                                @forelse ($ventasRecientes as $venta)
                                    @php
                                        $tagVenta = $venta->tags->first();
                                        $colorVenta = $tagVenta ? $tagVenta->color : 'bg-gray-100 text-gray-800';
                                        $nombreVenta = $tagVenta ? ucfirst($tagVenta->nombre) : 'Pendiente';
                                    @endphp
                                    <tr class="hover:bg-red-50 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium font-mono">
                                            #{{ $venta->codigo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            <div class="flex items-center">
                                                <div
                                                    class="h-8 w-8 rounded-full bg-red-100 flex items-center justify-center text-red-700 font-bold text-xs mr-2">
                                                    {{ substr($venta->usuario->name ?? 'U', 0, 1) }}
                                                </div>
                                                {{ $venta->usuario->name ?? 'Invitado' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">
                                            ${{ number_format($venta->total, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                            <span
                                                class="px-2.5 py-1 inline-flex text-xs leading-5 font-bold rounded-full border {{ $colorVenta }}">
                                                {{ $nombreVenta }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('orden.negocio.detalle', $venta->codigo) }}"
                                                class="text-indigo-600 hover:text-indigo-900 font-semibold">Ver Detalle</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                            Aún no has recibido pedidos en tu negocio.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
