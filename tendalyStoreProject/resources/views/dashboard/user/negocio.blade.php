@extends('dashboard.user.app')

@section('titulo', 'Mi Negocio')
@section('titulo_contenido', 'Gestión de Mi Negocio')
@section('primera_descripcion', 'Administra la información clave de tu negocio, productos y ventas.')

@section('contenido')

    @if (!$negocio)
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <svg class="mx-auto h-16 w-16 text-red-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">¡Aún no tienes un negocio registrado!</h3>
            <p class="text-gray-600 mb-6">Parece que no has configurado tu negocio en TendalyStore. ¡Es muy fácil comenzar!
                Crea tu negocio ahora y empieza a vender tus productos.</p>
            <a href="{{ route('negocio.create') }}"
                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Crear Nuevo Negocio
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md col-span-1 md:col-span-2">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.25V7A2.75 2.75 0 0018.25 4H5.75A2.75 2.75 0 003 7v10.5A2.75 2.75 0 005.75 20h12.5A2.75 2.75 0 0021 17.25v-4">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l-3-3-3 3"></path>
                    </svg>
                    Detalles del Negocio
                </h3>
                <p class="text-2xl font-bold text-gray-900 mb-2">{{ $negocio->nombre }}</p>
                <p class="text-gray-700 mb-4">{{ $negocio->descripcion }}</p>
                <div class="text-sm text-gray-600">
                    <p class="flex items-center mb-1">
                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Email de Contacto: <span class="ml-1 font-medium">{{ $negocio->correo }}</span>
                    </p>
                    <p class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Ubicación: <span class="ml-1 font-medium">{{ $negocio->distrito->nombre }}
                            {{ $negocio->departamento->nombre }} Perú</span>
                    </p>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('negocio.edit', $negocio->nombre) }}">
                        <button
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            Editar Información
                        </button>
                    </a>
                    <a href="{{ route('negocio.show', $negocio->nombre) }}"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Ver Página de Negocio
                    </a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5m-5 0h-2a2 2 0 00-2 2v4m0 0v4a2 2 0 002 2h2m4-4h4m-4 0a2 2 0 002-2V7a2 2 0 00-2-2h-4V3.01">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20v-4a2 2 0 012-2h4a2 2 0 012 2v4m-6 0a2 2 0 002 2h4a2 2 0 002-2"></path>
                        </svg>
                        Productos
                    </h3>
                    @if ($negocio->productos->isEmpty())
                        <p class="text-gray-600 mb-4">Aún no tienes productos registrados en tu negocio.</p>
                        <a href="{{ route('producto.create') }}"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            Registrar Nuevo Producto
                        </a>
                    @else
                        <p class="text-4xl font-bold text-gray-900 mb-2">{{ $negocio->productos->count() }}</p>
                        <p class="text-gray-600 mt-2">Productos activos en tu tienda.</p>

                        {{-- A futuro: Mostrar un detalle extra, el producto más vendido o el de mayor stock --}}

                        <a href="{{ route('producto.create') }}"
                            class="text-red-600 hover:text-red-700 font-semibold mt-4 block">Registrar Nuevo Producto
                            &rarr;</a>

                        <a href="{{ route('dashboard.producto') }}"
                            class="text-red-600 hover:text-red-700 font-semibold mt-4 block">Gestionar Productos &rarr;</a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sección de Ventas Recientes / Estadísticas -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19V6a2 2 0 00-2-2H5a2 2 0 00-2 2v13m6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0H9m7 0h2a2 2 0 002-2v-3m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2m-6 0H6">
                    </path>
                </svg>
                Resumen de Ventas
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="p-4 bg-red-50 rounded-lg">
                    <p class="text-sm text-gray-600">Ventas Totales</p>
                    <p class="text-3xl font-bold text-red-800 mt-1">4</p>
                </div>
                <div class="p-4 bg-red-50 rounded-lg">
                    <p class="text-sm text-gray-600">Ingresos Totales</p>
                    <p class="text-3xl font-bold text-red-800 mt-1">$4</p>
                </div>
                <div class="p-4 bg-red-50 rounded-lg">
                    <p class="text-sm text-gray-600">Ventas Hoy</p>
                    <p class="text-3xl font-bold text-red-800 mt-1">5</p>
                </div>
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Últimas Ventas</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID Venta
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cliente
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Producto
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #1001
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Ana García
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Camiseta Algodón Azul
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    $24.99
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    2023-10-26
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                    Completado
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #1002
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Pedro López
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    Pantalón Vaquero
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    $59.99
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    2023-10-25
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">
                                    Completado
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <a href="#" class="text-red-600 hover:text-red-700 font-semibold">Ver Todas las Ventas
                        &rarr;</a>
                </div>
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
                showConfirmButton: true
            });
        </script>
    @endif
@endpush
