@extends('dashboard.user.app')

@section('titulo', 'Mi Negocio')
@section('titulo_contenido', 'Gestión de Mi Negocio')
@section('primera_descripcion', 'Administra la información clave de tu negocio, productos y configuraciones de venta.')

@section('contenido')

    @if (!$negocio)
        <!-- Estado Vacío (Sin cambios) -->
        <div class="max-w-2xl mx-auto mt-10">
            <div
                class="bg-white p-10 rounded-xl shadow-lg border border-gray-100 text-center hover:shadow-xl transition-shadow duration-300">
                <div class="bg-red-50 w-24 h-24 mx-auto rounded-full flex items-center justify-center mb-6">
                    <svg class="h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">¡Aún no tienes un negocio registrado!</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto leading-relaxed">
                    Parece que no has configurado tu tienda en TendalyStore. Crea tu perfil de negocio ahora para empezar a
                    vender.
                </p>
                <a href="{{ route('negocio.create') }}"
                    class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear Nuevo Negocio
                </a>
            </div>
        </div>
    @else
        <!-- Grid Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

            <!-- COLUMNA IZQUIERDA (2/3): Detalles del Negocio -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300 h-full">
                    <div class="p-6 border-b border-gray-50 bg-gray-50/50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <span class="bg-red-100 p-2 rounded-lg mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </span>
                            Información del Negocio
                        </h3>
                        <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Activo</span>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h2 class="sm:text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">
                                {{ $negocio->nombre }}</h2>
                            <p class="text-gray-500 mt-2 text-sm leading-relaxed">{{ $negocio->descripcion }}</p>
                        </div>

                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-5 rounded-xl border border-gray-100 mb-6">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wide">Email</p>
                                    <p class="text-xs md:text-sm font-medium text-gray-800">{{ $negocio->correo }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wide">Ubicación</p>
                                    <p class="text-sm font-medium text-gray-800">
                                        {{ $negocio->distrito->nombre }}, {{ $negocio->departamento->nombre }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row md:justify-end md:space-x-4 space-y-4 md:space-y-0 mb-8">
                            <a href="{{ route('negocio.edit', $negocio->nombre) }}"
                                class="flex-1 bg-white border border-gray-200 hover:border-red-300 text-gray-700 hover:text-red-600 font-medium py-2.5 px-4 rounded-lg transition duration-150 text-center shadow-sm">
                                Editar Información
                            </a>
                            <a href="{{ route('negocio.show', $negocio->nombre) }}" target="_blank"
                                class="flex-1 bg-red-600 hover:bg-red-800 text-white font-medium py-2.5 px-4 rounded-lg shadow hover:shadow-md transition duration-150 text-center flex justify-center items-center">
                                Ver Tienda
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA (1/3): Productos + NUEVA CONFIGURACIÓN -->
            <div class="flex flex-col gap-6">

                <!-- 1. Tarjeta: Resumen de Productos -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col hover:shadow-md transition-shadow duration-300">
                    <div class="p-5 border-b border-gray-50 bg-gray-50/50">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Inventario
                        </h3>
                    </div>
                    <div class="p-5 text-center">
                        @if ($negocio->productos->isEmpty())
                            <p class="text-gray-500 mb-4 text-sm">Sin productos registrados.</p>
                            <a href="{{ route('producto.create') }}"
                                class="w-full block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg text-sm transition duration-150">
                                + Crear Producto
                            </a>
                        @else
                            <div class="flex items-baseline justify-center space-x-2 mb-2">
                                <span
                                    class="text-5xl font-black text-gray-800 tracking-tighter">{{ $negocio->productos->count() }}</span>
                                <span class="text-gray-500 font-medium">items</span>
                            </div>
                            <div class="space-y-2 mt-4">
                                <a href="{{ route('producto.create') }}"
                                    class="block w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-sm text-sm">
                                    Nuevo Producto
                                </a>
                                <a href="{{ route('dashboard.producto') }}"
                                    class="block w-full bg-white border border-gray-200 hover:border-red-300 text-gray-700 hover:text-red-600 font-semibold py-2 px-4 rounded-lg transition duration-150 text-sm">
                                    Ver Catálogo
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-lg border border-gray-700 text-white flex flex-col hover:shadow-xl transition-shadow duration-300 relative overflow-hidden">
                    <!-- Decoración de fondo -->
                    <div class="absolute top-0 right-0 -mt-2 -mr-2 w-16 h-16 bg-white opacity-10 rounded-full blur-xl">
                    </div>

                    <div class="p-5 border-b border-gray-700">
                        <h3 class="text-lg font-bold flex items-center text-white">
                            <svg class="w-5 h-5 mr-2 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Logística y Costos
                        </h3>
                    </div>
                    <div class="p-5 flex flex-col justify-between h-full">
                        <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                            Define si tienes <strong>Delivery</strong>, configura el costo de envío, métodos de pago y notas
                            para tus clientes.
                        </p>

                        <a href="{{ route('logistica.create') }}"
                            class="w-full flex items-center justify-center bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Configurar Opciones
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- WIP-VENTAS -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-8 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800 flex items-center mb-4 md:mb-0">
                    <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19V6a2 2 0 00-2-2H5a2 2 0 00-2 2v13m6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0H9m7 0h2a2 2 0 002-2v-3m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2m-6 0H6">
                        </path>
                    </svg>
                    Gestión de Ventas
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Cliente</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Info
                                Delivery</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Total
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">#1001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Ana García</td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Delivery Express
                                    (+$10)</span>
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">$34.99</td>
                            <td class="px-6 py-4 text-right text-sm">
                                <button class="text-blue-600 hover:text-blue-900 font-medium">Gestionar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('negocio'))
        <script>
            Swal.fire({
                icon: 'success',
                timer: 2500,
                title: "{{ session('negocio') }}",
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        </script>
    @endif
    @if (session('logistica'))
        <script>
            Swal.fire({
                icon: 'success',
                timer: 2500,
                title: "{{ session('logistica') }}",
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        </script>
    @endif
@endpush
