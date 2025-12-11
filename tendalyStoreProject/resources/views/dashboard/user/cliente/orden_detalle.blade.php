@extends('dashboard.user.app')

@section('titulo', 'Detalle de Orden')
@section('titulo_contenido', 'Detalle del Pedido #' . $orden->codigo)
@section('primera_descripcion', 'Revisa la información completa de tu compra realizada el ' .
    $orden->created_at->format('d/m/Y') . '.')

@section('contenido')
    <div class="max-w-6xl mx-auto space-y-6">

        {{-- 1. ENCABEZADO SUPERIOR: Navegación y Acciones Principales --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            {{-- Breadcrumb / Botón Regresar --}}
            <a href="{{ route('orden.cliente') }}"
                class="group inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors">
                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Volver a mis pedidos
            </a>

            <div class="flex gap-3">

                <a href="#"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Descargar PDF
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- 2. COLUMNA IZQUIERDA: Detalle de Productos (2/3 del ancho) --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Tarjeta de Productos --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    {{-- Cabecera de la sección --}}
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            {{-- Logo Negocio Placeholder --}}
                            <div
                                class="h-8 w-8 rounded bg-white border border-gray-200 flex items-center justify-center text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900">
                                Vendido por: {{ $orden->negocio->nombre ?? 'Tienda Principal' }}
                            </span>
                        </div>
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $orden->tags->first()->color }}">
                            {{ ucfirst($orden->tags->first()->nombre) }}
                        </span>
                    </div>

                    {{-- Lista de Items --}}
                    <ul class="divide-y divide-gray-100">
                        @foreach ($orden->items as $item)
                            <li
                                class="p-6 flex flex-col sm:flex-row items-start sm:items-center gap-6 hover:bg-gray-50 transition-colors">
                                {{-- Imagen --}}
                                <div
                                    class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100">
                                    @if ($item->productos && $item->productos->imagen)
                                        <img src="{{ asset('storage/productos/' . $item->productos->imagen) }}"
                                            class="h-full w-full object-cover object-center"
                                            alt="{{ $item->productos->nombre }}">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-gray-400">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Detalles del Producto --}}
                                <div class="flex-1">
                                    <div class="flex justify-between">
                                        <h4 class="text-base font-medium text-gray-900">
                                            <a href="{{ route('producto.show', $item->productos->nombre) }}"
                                                class="hover:underline">{{ $item->productos->nombre ?? 'Producto Eliminado' }}</a>
                                        </h4>
                                        <p class="text-base font-semibold text-gray-900 ml-4">
                                            ${{ number_format($item->subtotal, 2) }}
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $item->productos->categoria->nombre ?? 'Sin categoría' }}</p>

                                    {{-- Atributos (si los tienes) --}}
                                    <div class="mt-2 text-sm text-gray-500 flex gap-4">
                                        <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs">Precio unit:
                                            ${{ number_format($item->precio_unitario, 2) }}</span>
                                        <span class="font-medium text-gray-700">Cant: {{ $item->cantidad }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Opcional: Notas del Cliente --}}
                @if ($orden->notas_cliente)
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <h5 class="text-sm font-bold text-yellow-800 mb-1">Nota del pedido:</h5>
                        <p class="text-sm text-yellow-700">{{ $orden->notas_cliente }}</p>
                    </div>
                @endif

            </div>

            {{-- 3. COLUMNA DERECHA: Resumen Financiero y Logística (1/3 del ancho) --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- Card: Resumen Financiero --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Resumen de Pago</h2>

                    <dl class="space-y-3 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <dt>Subtotal</dt>
                            <dd class="font-medium text-gray-900">
                                ${{ number_format($orden->total - $orden->costo_envio, 2) }}</dd>
                        </div>

                        {{-- Descuento (Si aplica) --}}
                        @if ($orden->descuento > 0)
                            <div class="flex justify-between text-green-600">
                                <dt>Descuento</dt>
                                <dd>- ${{ number_format($orden->descuento, 2) }}</dd>
                            </div>
                        @endif

                        <div class="flex justify-between pt-3 border-t border-gray-100">
                            <dt>Envío</dt>
                            <dd class="font-medium text-gray-900">
                                @if ($orden->costo_envio > 0)
                                    ${{ number_format($orden->costo_envio, 2) }}
                                @else
                                    <span class="text-green-600">Gratis</span>
                                @endif
                            </dd>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                            <dt class="text-base font-bold text-gray-900">Total</dt>
                            <dd class="text-xl font-bold text-red-600">${{ number_format($orden->total, 2) }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Card: Información de Entrega --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Información de Entrega</h2>

                    <div class="space-y-4">
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Método</p>
                            <p class="text-sm text-gray-900 font-medium flex items-center">
                                @if ($orden->tipo_entrega == 'delivery')
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Envío a domicilio
                                @else
                                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    Recojo en Tienda
                                @endif
                            </p>
                        </div>

                        @if ($orden->tipo_entrega == 'delivery')
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Dirección de
                                    envío</p>
                                <p
                                    class="text-sm text-gray-600 leading-relaxed bg-gray-50 p-3 rounded-md border border-gray-100">
                                    {{ $orden->direccion_entrega }}
                                    {{-- <br><span class="text-xs text-gray-400">Referencia: Frente al parque...</span> --}}
                                </p>
                            </div>
                        @endif

                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Datos del Cliente
                            </p>
                            <p class="text-sm text-gray-900">{{ $orden->usuario->name }}</p>
                            <p class="text-sm text-gray-500">{{ $orden->usuario->email }}</p>
                        </div>
                    </div>
                </div>

                {{-- Card: Ayuda --}}
                {{-- <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4">
                    <div class="flex gap-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-indigo-800">¿Necesitas ayuda?</h3>
                            <div class="mt-1 text-xs text-indigo-700">
                                <p>Si tienes problemas con este pedido, contacta con soporte.</p>
                            </div>
                            <div class="mt-2">
                                <a href="#"
                                    class="text-xs font-bold text-indigo-800 hover:text-indigo-900 underline">
                                    Contactar al vendedor
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection
