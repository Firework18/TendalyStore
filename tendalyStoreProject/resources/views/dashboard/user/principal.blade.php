@extends('dashboard.user.app')

@section('titulo')
    Inicio
@endsection

@section('titulo_contenido')
    <h1 class="text-3xl font-extrabold text-red-900 leading-tight">Tu Resumen</h1>
@endsection

@section('primera_descripcion')
    <p class="text-lg text-red-800 mb-6">¡Bienvenido de nuevo, <span class="font-semibold">{{ $user->name }}</span>!
        Aquí tienes un resumen de tu actividad.
        @if ($user->negocios && $user->negocios->count() > 0)
            {{-- Asumiendo que 'negocios' es una colección o array --}}
            También puedes ver el rendimiento de tu negocio.
        @else
            Explora nuestros productos y ofertas especiales.
        @endif
    </p>
@endsection

@section('contenido')
    <div class="space-y-8">

        {{-- SECCIÓN PARA USUARIOS CLIENTES (siempre visible o la base) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-red-700 to-red-900 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold mb-1 opacity-90">Pedidos Activos</h3>
                    <p class="text-4xl font-bold">2</p> {{-- Valor dinámico --}}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="size-6">
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
                    <p class="text-3xl font-bold text-red-800">$75.99</p> {{-- Valor dinámico --}}
                    <p class="text-gray-600 text-sm mt-1">hace 3 días</p> {{-- Valor dinámico --}}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="size-6">
                    <path
                        d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z"
                        clip-rule="evenodd" />
                </svg>


            </div>

        </div>

        <!-- Mis Últimos Pedidos -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-600 mb-8">
            <h3 class="text-xl font-semibold text-red-900 mb-4">Mis Últimos Pedidos</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-red-200">
                    <thead class="bg-red-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                ID Pedido</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Fecha</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Total</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Estado</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-red-100">
                        <tr class="hover:bg-red-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#C1023</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-26</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$59.99</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">En
                                    Camino</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Seguir
                                    Pedido</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-red-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#C1022</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$120.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Entregado</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                    Detalles</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-red-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#C1021</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$85.50</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Entregado</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                    Detalles</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        {{-- SECCIÓN PARA USUARIOS CON NEGOCIO (condicionalmente visible) --}}
        @if ($user->negocios && $user->negocios->count() > 0)
            <h2 class="text-2xl font-bold text-red-900 mt-10 mb-6 border-b-2 border-red-200 pb-2">Tu Negocio:
                {{ $user->Negocios->nombre }}
            </h2>

            <!-- Métricas Principales del Negocio -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-gradient-to-br from-red-700 to-red-900 text-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold mb-2 opacity-90">Ventas Totales</h3>
                    <p class="text-4xl font-bold">$12,450</p> {{-- Valor dinámico --}}
                    <p class="text-red-200 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8L13 16A4 4 0 017 12H7"></path>
                        </svg>
                        +12% desde el mes pasado
                    </p>
                </div>
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold text-red-900 mb-2">Pedidos Nuevos</h3>
                    <p class="text-4xl font-bold text-red-800">158</p> {{-- Valor dinámico --}}
                    <p class="text-gray-600 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7l4-4m0 0l4 4m-4-4v18">
                            </path>
                        </svg>
                        +8% desde el mes pasado
                    </p>
                </div>
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold text-red-900 mb-2">Productos Vendidos</h3>
                    <p class="text-4xl font-bold text-red-800">540</p> {{-- Valor dinámico --}}
                    <p class="text-gray-600 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7l4-4m0 0l4 4m-4-4v18">
                            </path>
                        </svg>
                        +15% desde el mes pasado
                    </p>
                </div>
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 transform hover:scale-105 transition duration-300 ease-in-out">
                    <h3 class="text-lg font-semibold text-red-900 mb-2">Nuevos Clientes</h3>
                    <p class="text-4xl font-bold text-red-800">72</p> {{-- Valor dinámico --}}
                    <p class="text-gray-600 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7l4-4m0 0l4 4m-4-4v18">
                            </path>
                        </svg>
                        +5% desde el mes pasado
                    </p>
                </div>
            </div>



            <!-- Ventas Recientes del Negocio -->
            <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-600 mb-8">
                <h3 class="text-xl font-semibold text-red-900 mb-4">Ventas Recientes del Negocio</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-red-200">
                        <thead class="bg-red-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    ID Pedido</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    Cliente</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    Fecha</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    Total</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    Estado</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-red-100">
                            <tr class="hover:bg-red-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Maria García</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-26</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$59.99</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completado</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                        Detalles</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-red-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Pedro López</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-25</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$120.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                        Detalles</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-red-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-900 font-medium">#003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Ana Fernández</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2023-10-24</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-red-800 font-bold">$85.50</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completado</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-red-600 hover:text-red-900 transition duration-150">Ver
                                        Detalles</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tareas Pendientes o Notificaciones del Negocio -->
            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600">
                <h3 class="text-xl font-semibold text-red-900 mb-4">Notificaciones y Tareas de tu Negocio</h3>
                <ul class="space-y-4">
                    <li
                        class="flex items-center space-x-3 py-3 px-4 bg-red-50 rounded-md shadow-sm hover:bg-red-100 transition duration-150">
                        <svg class="w-6 h-6 text-yellow-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        <p class="text-gray-800 flex-grow">Nuevo pedido pendiente de envío: <span
                                class="font-bold text-red-800">#002</span></p>
                        <a href="#"
                            class="text-red-600 hover:text-red-900 text-sm font-semibold ml-auto flex-shrink-0">Ver</a>
                    </li>
                    <li
                        class="flex items-center space-x-3 py-3 px-4 bg-red-50 rounded-md shadow-sm hover:bg-red-100 transition duration-150">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                        <p class="text-gray-800 flex-grow">Actualizar descripción del producto: <span
                                class="font-bold text-red-800">"Camiseta Premium"</span></p>
                        <a href="#"
                            class="text-red-600 hover:text-red-900 text-sm font-semibold ml-auto flex-shrink-0">Editar</a>
                    </li>
                    <li
                        class="flex items-center space-x-3 py-3 px-4 bg-red-50 rounded-md shadow-sm hover:bg-red-100 transition duration-150">
                        <svg class="w-6 h-6 text-purple-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        <p class="text-gray-800 flex-grow">Revisar informe mensual de ventas.</p>
                        <a href="#"
                            class="text-red-600 hover:text-red-900 text-sm font-semibold ml-auto flex-shrink-0">Generar</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
@endsection
