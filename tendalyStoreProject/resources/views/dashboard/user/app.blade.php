<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TendalyStore - @yield('titulo')</title>
    @stack('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/stylesDashboard.css') }}">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white p-4 shadow-md fixed w-full top-0 navbar ">
        <div class="container mx-auto flex justify-between items-center">

            <button id="sidebarToggle" class="text-red-500 lg:hidden mr-4 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <a href="{{ route('home') }}"
                class="mx-auto md:mx-0 text-xl font-bold text-red-600 flex items-center justify-center w-full md:w-auto">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="LOGO TENDALY" width="100px" />
            </a>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="flex items-center space-x-2 hover:text-red-600 focus:outline-none"
                        id="userMenuButton">
                        <img src="{{ auth()->user()->imagen ? asset('/perfiles/' . auth()->user()->imagen) : asset('assets/images/default-profile.png') }}"
                            alt="Avatar" class="w-8 h-8 rounded-full border-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                        <a href="{{ route('dashboard.perfil') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Mi Perfil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Configuración</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Cerrar
                                Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- SIDEBAR EN MOVIL -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <aside id="sidebar" class="sidebar bg-red-700 text-white fixed h-full shadow-lg">
        <nav class="mt-5">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.perfil') }}"
                        class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Mi Perfil
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.negocio') }}"
                        class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.25V7A2.75 2.75 0 0018.25 4H5.75A2.75 2.75 0 003 7v10.5A2.75 2.75 0 005.75 20h12.5A2.75 2.75 0 0021 17.25v-4">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l-3-3-3 3">
                            </path>
                        </svg>
                        Mi Negocio
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.producto') }}"
                        class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5m-5 0h-2a2 2 0 00-2 2v4m0 0v4a2 2 0 002 2h2m4-4h4m-4 0a2 2 0 002-2V7a2 2 0 00-2-2h-4V3.01">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20v-4a2 2 0 012-2h4a2 2 0 012 2v4m-6 0a2 2 0 002 2h4a2 2 0 002-2"></path>
                        </svg>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19V6a2 2 0 00-2-2H5a2 2 0 00-2 2v13m6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0H9m7 0h2a2 2 0 002-2v-3m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2m-6 0H6">
                            </path>
                        </svg>
                        Ventas
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                        Reportes
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 hover:bg-red-700 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Configuración
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <main class="content p-8 pt-24 min-h-screen">
        <header class="mb-8">
            <h2 class="text-3xl font-semibold text-gray-800-darker">@yield('titulo_contenido')</h2>
            <p class="text-gray-600">@yield('primera_descripcion')</p>
        </header>

        @yield('contenido')

    </main>

    <script>
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        if (userMenuButton) {
            userMenuButton.addEventListener('click', (event) => {
                userMenu.classList.toggle('hidden');
                event.stopPropagation();
            });
        }

        window.addEventListener('click', (event) => {
            if (userMenu && !userMenu.contains(event.target) && userMenuButton && !userMenuButton.contains(event
                    .target)) {
                userMenu.classList.add('hidden');
            }
        });

        document.querySelectorAll('.sidebar a').forEach(item => {
            item.addEventListener('click', event => {
                document.querySelectorAll('.sidebar a').forEach(link => {
                    link.classList.remove('active-link');
                });
                event.currentTarget.classList.add('active-link');

                if (window.innerWidth < 1024) {
                    document.getElementById('sidebar').classList.remove('active');
                    document.getElementById('sidebarOverlay').classList.remove('active');
                }
            });
        });

        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024)
                sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    </script>
    @livewireScripts
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
