<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TendalyStore - @yield('titulo')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />

    @vite(['resources/css/app.css'])
    @livewireStyles


    <link rel="stylesheet" href="{{ asset('assets/stylesDashboard.css') }}">

    @stack('styles')
</head>

<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white px-4 py-2 shadow-md fixed w-full top-0 z-50 h-16 flex items-center justify-between">

        <div class="flex items-center">
            <button id="sidebarToggle"
                class="text-red-600 lg:hidden focus:outline-none hover:bg-red-50 p-2 rounded-md transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <a href="{{ route('home') }}"
            class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="LOGO" class="h-10 w-auto" />
        </a>

        <div class="hidden md:flex items-center space-x-4">
            <x-nav-horizontal />
        </div>
    </nav>
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden transition-opacity lg:hidden">
    </div>

    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-gradient-to-b from-red-700 to-red-800 text-white transition-transform duration-300 transform -translate-x-full lg:translate-x-0 shadow-xl border-r border-red-800">

        <nav class="h-full overflow-y-auto px-3 pb-4">

            <div class="mb-2 mt-2 px-4 text-xs font-semibold text-red-200 uppercase tracking-wider">
                General
            </div>

            <ul class="space-y-1 mb-6">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('dashboard')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-speedometer2 mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.perfil') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('dashboard.perfil')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-person mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Mi Perfil</span>
                    </a>
                </li>
            </ul>

            <div class="mb-2 px-4 text-xs font-semibold text-red-200 uppercase tracking-wider">
                Gestión
            </div>

            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard.negocio') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('dashboard.negocio')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-briefcase mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Mi Negocio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.producto') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('dashboard.producto')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-box-seam mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Productos</span>
                    </a>
                </li>
            </ul>

            <div class="mb-2 mt-6 px-4 text-xs font-semibold text-red-200 uppercase tracking-wider">
                Transacciones
            </div>

            <ul class="space-y-1">
                <li>
                    <a href="{{ route('orden.negocio') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('orden.negocio')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-currency-dollar mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orden.cliente') }}"
                        class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                   {{ request()->routeIs('orden.cliente')
                       ? 'bg-white text-red-700 shadow-md font-semibold'
                       : 'text-red-50 hover:bg-white/10 hover:text-white' }}">

                        <i class="bi bi-bag-check mr-3 text-xl transition-transform group-hover:scale-110"></i>
                        <span>Mis Pedidos</span>
                    </a>
                </li>
            </ul>

        </nav>
    </aside>

    <x-nav-celular />

    <main class="p-8 pt-24 transition-all duration-300 min-h-screen lg:ml-64">
        <header class="mb-8">
            <h2 class="text-3xl font-semibold text-gray-800">@yield('titulo_contenido')</h2>
            <p class="text-gray-600 mt-1">@yield('primera_descripcion')</p>
        </header>
        <div class="bg-white rounded-lg shadow p-6 mb-10">
            @yield('contenido')
        </div>
    </main>

    @livewireScripts
    @vite('resources/js/app.js')

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebarOverlay.classList.add('hidden');
            } else {
                sidebarOverlay.classList.remove('hidden');
            }
        }

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                toggleSidebar();
            });
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebarOverlay.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
