<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
        }
        .content {
            margin-left: 250px;
        }
        .text-red-800-darker {
            color: #8B0000; /* Un rojo más oscuro */
        }
        .bg-red-600-lighter {
            background-color: #EF4444; /* Un rojo un poco más claro para contrastar */
        }
        .border-red-700 {
            border-color: #DC2626;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar Superior -->
    <nav class="bg-red-800 p-4 shadow-md fixed w-full top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">Panel de Control E-commerce</h1>
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Buscar..." class="p-2 rounded bg-red-700 text-white placeholder-red-300 focus:outline-none focus:ring-2 focus:ring-red-400">
                <button class="text-white hover:text-red-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="relative">
                    <button class="flex items-center space-x-2 text-white hover:text-red-200 focus:outline-none" id="userMenuButton">
                        <img src="https://via.placeholder.com/30" alt="Avatar" class="w-8 h-8 rounded-full border-2 border-white">
                        <span>John Doe</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Mi Perfil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Configuración</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar de Navegación -->
    <aside class="sidebar bg-red-900 text-white fixed h-full pt-20 shadow-lg">
        <nav class="mt-5">
            <ul>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200 active-link">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Mi Perfil
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.25V7A2.75 2.75 0 0018.25 4H5.75A2.75 2.75 0 003 7v10.5A2.75 2.75 0 005.75 20h12.5A2.75 2.75 0 0021 17.25v-4"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l-3-3-3 3"></path></svg>
                        Mi Negocio
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5m-5 0h-2a2 2 0 00-2 2v4m0 0v4a2 2 0 002 2h2m4-4h4m-4 0a2 2 0 002-2V7a2 2 0 00-2-2h-4V3.01"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20v-4a2 2 0 012-2h4a2 2 0 012 2v4m-6 0a2 2 0 002 2h4a2 2 0 002-2"></path></svg>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6a2 2 0 00-2-2H5a2 2 0 00-2 2v13m6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0H9m7 0h2a2 2 0 002-2v-3m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2m-6 0H6"></path></svg>
                        Ventas
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                        Reportes
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Configuración
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <main class="content p-8 pt-24 min-h-screen">
        <header class="mb-8">
            <h2 class="text-3xl font-semibold text-gray-800-darker">Resumen del Dashboard</h2>
            <p class="text-gray-600">Bienvenido de nuevo, John Doe. Aquí tienes un resumen de la actividad de tu negocio.</p>
        </header>

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

    </main>

    <script>
        // Script para el menú desplegable del usuario
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        // Ocultar el menú si se hace clic fuera
        window.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });

        // Script para la interactividad de la sidebar (ejemplo simple de "active link")
        document.querySelectorAll('.sidebar a').forEach(item => {
            item.addEventListener('click', event => {
                document.querySelectorAll('.sidebar a').forEach(link => {
                    link.classList.remove('active-link');
                });
                event.currentTarget.classList.add('active-link');
            });
        });
    </script>
</body>
</html>