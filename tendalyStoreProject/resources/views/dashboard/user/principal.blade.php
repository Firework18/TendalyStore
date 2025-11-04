@extends('dashboard.user.app')
@section('titulo')
Inicio
@endsection

@section('titulo_contenido')
Resumen del dashboard
@endsection

@section('primera_descripcion')
Bienvenido de nuevo, {{auth()->user()->name}} Aquí tienes un resumen de la actividad de tu negocio.
@endsection

@section('contenido')
<!-- Métricas Principales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700">Ventas Totales</h3>
                <p class="text-3xl font-bold text-red-800">$12,450</p>
                <p class="text-gray-500">+12% desde el mes pasado</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700">Pedidos Nuevos</h3>
                <p class="text-3xl font-bold text-red-800">158</p>
                <p class="text-gray-500">+8% desde el mes pasado</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700">Productos Vendidos</h3>
                <p class="text-3xl font-bold text-red-800">540</p>
                <p class="text-gray-500">+15% desde el mes pasado</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700">Nuevos Clientes</h3>
                <p class="text-3xl font-bold text-red-800">72</p>
                <p class="text-gray-500">+5% desde el mes pasado</p>
            </div>
        </div>

        <!-- Gráficos y Tablas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Tendencia de Ventas (Últimos 6 meses)</h3>
                <!-- Aquí iría un gráfico. Para este ejemplo, lo representamos con un placeholder. -->
                <div class="h-64 bg-gray-50 flex items-center justify-center text-gray-400 border border-dashed border-gray-300 rounded-md">
                    [Gráfico de Líneas de Ventas]
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Productos más Vendidos</h3>
                <ul class="space-y-3">
                    <li class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                        <span class="text-gray-800">Camiseta Premium</span>
                        <span class="text-red-800 font-semibold">120 unidades</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                        <span class="text-gray-800">Taza Personalizada</span>
                        <span class="text-red-800 font-semibold">95 unidades</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                        <span class="text-gray-800">Libreta Ecológica</span>
                        <span class="text-red-800 font-semibold">80 unidades</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                        <span class="text-gray-800">Sudadera Casual</span>
                        <span class="text-red-800 font-semibold">70 unidades</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Ventas Recientes -->
        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600 mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Ventas Recientes</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pedido</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Maria García</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-26</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-semibold">$59.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completado</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900">Ver Detalles</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Pedro López</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-25</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-semibold">$120.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900">Ver Detalles</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#003</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ana Fernández</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-24</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-semibold">$85.50</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completado</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900">Ver Detalles</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tareas Pendientes o Notificaciones -->
        <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-red-600">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Notificaciones y Tareas</h3>
            <ul class="space-y-3">
                <li class="flex items-center space-x-3 py-2 border-b border-gray-200 last:border-b-0">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="text-gray-800">Nuevo pedido pendiente de envío: <span class="font-semibold">#002</span></p>
                    <a href="#" class="text-red-600 hover:text-red-900 text-sm ml-auto">Ver</a>
                </li>
                <li class="flex items-center space-x-3 py-2 border-b border-gray-200 last:border-b-0">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    <p class="text-gray-800">Actualizar descripción del producto: <span class="font-semibold">"Camiseta Premium"</span></p>
                    <a href="#" class="text-red-600 hover:text-red-900 text-sm ml-auto">Editar</a>
                </li>
                <li class="flex items-center space-x-3 py-2 border-b border-gray-200 last:border-b-0">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <p class="text-gray-800">Revisar informe mensual de ventas.</p>
                    <a href="#" class="text-red-600 hover:text-red-900 text-sm ml-auto">Generar</a>
                </li>
            </ul>
        </div>
@endsection