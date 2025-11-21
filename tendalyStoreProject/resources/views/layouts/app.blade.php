<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TendalyStore - @yield('titulo')</title>
    @stack('styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">

    @livewireStyles
</head>


<body class="bg-gray-50">
    <div class="grid-container">

        <header
            class="header-top fixed top-0 left-0 right-0 bg-white shadow-md p-4 flex items-center justify-between z-50">
            <a href="{{ route('home') }}"
                class="mx-auto md:mx-0 text-xl font-bold text-red-600 flex items-center justify-center w-full md:w-auto">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="LOGO TENDALY" width="100px" />
            </a>

            <nav class="hidden md:flex items-center gap-2">

                <a href="{{ route('nosotros') }}" class="text-red-500"><i class="bi bi-body-text"></i> <span
                        class="text-sm">Nosotros</span></a>


                <a href="{{ route('catalogo') }}" class="text-red-500"><i class="bi bi-grid"></i> <span
                        class="text-sm">Catálogo</span></a>

                <a href="{{ route('carrito.index') }}" class="text-red-500"><i class="bi bi-cart"></i> <span
                        class="text-sm">Carrito</span></a>

                <x-nav-horizontal />
            </nav>
        </header>

        <x-nav-celular />


        @yield('contenido')

        <footer id="contact" class="footer-section pt-12 pb-28 md:pb-12 px-4 bg-[var(--primary-blue)] text-white">
            <div class="content-wrapper max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10 border-b border-white border-opacity-20 pb-8">
                    <div>
                        <h4 class="font-bold text-2xl mb-4 text-[var(--accent-yellow)]">
                            Contáctanos
                        </h4>
                        <p class="mb-2">
                            <i class="bi bi-geo-alt-fill mr-2 text-[var(--accent-yellow)]"></i>
                            Av. Antonio Miroquesada 425 - Lima
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-telephone-fill mr-2 text-[var(--accent-yellow)]"></i>
                            (+511) 611 6000
                        </p>
                        <p class="mb-4 break-all">
                            <i class="bi bi-envelope-fill mr-2 text-[var(--accent-yellow)]"></i>
                            contacto@tendalystore.com
                        </p>
                    </div>

                </div>
                <div>
                    <div class="flex justify-center text-center md:text-left">
                        <p>&copy; {{ now()->year }} tendalyStore.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @vite('resources/js/app.js')

    <!-- Scripts -->
    @stack('scripts')
    @livewireScripts
</body>

</html>
