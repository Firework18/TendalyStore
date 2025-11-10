<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TendalyStore - @yield('titulo')</title>
    @stack('styles')
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
</head>

<body>
    <div class="grid-container">
        <!-- Cabecera de la página Inicio -->

        <header
            class="header-top fixed top-0 left-0 right-0 bg-white shadow-md p-4 flex items-center justify-between z-50">
            <a href="{{ route('home') }}"
                class="mx-auto md:mx-0 text-xl font-bold text-red-600 flex items-center justify-center w-full md:w-auto">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="LOGO TENDALY" width="100px" />
            </a>

            <nav class="hidden md:flex">
                <div class="items-center space-x-4 flex">
                    <a class="flex items-center space-x-2 text-black hover:text-red-600 transition" href="/dashboard">
                        <i class="bi bi-person text-2xl"></i>
                        <span class="text-sm">
                            @auth
                                Mi cuenta
                            @endauth
                        </span>
                    </a>

                    <a class="relative text-black hover:text-red-600 transition" href="#carrito">
                        <i class="bi bi-cart text-2xl"></i>
                    </a>
                    <div class="relative">
                        <button id="userMenuButton" class="relative text-black hover:text-red-600 transition"
                            href="#carrito">
                            <i class="bi bi-list text-2xl"></i>
                        </button>
                        <div id="userMenu"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                            @auth
                                <a href="{{ route('post.index', auth()->user()->username) }}"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Mi Muro</a>

                            @endauth
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Configuración</a>
                            @auth
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Cerrar
                                        Sesión</button>

                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="md:hidden fixed bottom-0 left-0 right-0 bg-red-800  z-40 shadow-lg">
            <div class="flex items-center  justify-between px-4 py-4">

                <a href="{{ route('dashboard.perfil') }}">
                    <i class="bi bi-person text-2xl text-white"></i>
                </a>
                <a href="#carrito">
                    <i class="bi bi-cart text-2xl text-white"></i>
                </a>

                <a href="#">
                    <i class="bi bi-list text-2xl text-white"></i>
                </a>
            </div>
        </div>

        @yield('contenido')

        <!-- Sección de contacto / pie de página -->
        <footer id="contact" class="footer-section pt-12 pb-24  md:pb-12 px-4 bg-[var(--primary-blue)] text-white">
            <div class="content-wrapper max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10 border-b border-white border-opacity-20 pb-8">
                    <div>
                        <h4 class="font-bold text-2xl mb-4 text-[var(--accent-yellow)]">
                            Contáctanos
                        </h4>
                        <p class="mb-2">
                            <i class="bi bi-geo-alt-fill mr-2 text-[var(--accent-yellow)]"></i>
                            Av. Antonio Miroquesada (ex Juan de Aliaga) 425 - 4° piso,
                            urbanización San Felipe - Magdalena del Mar - Lima
                        </p>
                        <p class="mb-2">
                            <i class="bi bi-telephone-fill mr-2 text-[var(--accent-yellow)]"></i>
                            (+511) 611 6000
                        </p>
                        <p class="mb-4 break-all">
                            <i class="bi bi-envelope-fill mr-2 text-[var(--accent-yellow)]"></i>
                            bioyeconegocios@minam.gob.pe
                        </p>
                        <div class="flex space-x-4 text-2xl mt-4">
                            <a href="#" class="hover:text-[var(--accent-yellow)] transition"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="#" class="hover:text-[var(--accent-yellow)] transition"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="#" class="hover:text-[var(--accent-yellow)] transition"><i
                                    class="bi bi-linkedin"></i></a>
                            <a href="#" class="hover:text-[var(--accent-yellow)] transition"><i
                                    class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold text-2xl mb-4 text-[var(--accent-yellow)]">
                            Déjanos un mensaje
                        </h4>
                        <form>
                            <input type="text" placeholder="Nombre y Apellido"
                                class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--accent-yellow)]"
                                required />
                            <input type="email" placeholder="Correo electrónico"
                                class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--accent-yellow)]"
                                required />
                            <input type="text" placeholder="Asunto"
                                class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--accent-yellow)]"
                                required />
                            <textarea placeholder="Mensaje" rows="4"
                                class="w-full p-3 mb-3 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-[var(--accent-yellow)] resize-none"
                                required></textarea>
                            <button type="submit"
                                class="w-full font-bold py-3 px-4 rounded-lg bg-[var(--accent-yellow)] text-[var(--primary-blue)] hover:bg-yellow-400 transition">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
                <div class="text-center text-sm text-gray-300 mt-8">
                    &copy; {{ now()->year }} tendalyStore. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>
    @vite('resources/js/app.js')
    <script>
        // Script para el menú desplegable del usuario
        const userMenuButton = document.getElementById('userMenuButton');
        const userMenu = document.getElementById('userMenu');

        if (userMenuButton) { // Asegúrate de que el botón exista antes de añadir el listener
            userMenuButton.addEventListener('click', (event) => {
                userMenu.classList.toggle('hidden');
                event.stopPropagation(); // Evita que el clic se propague al window y cierre el menú inmediatamente
            });
        }

        // Ocultar el menú de usuario si se hace clic fuera
        window.addEventListener('click', (event) => {
            if (userMenu && !userMenu.contains(event.target) && userMenuButton && !userMenuButton.contains(event
                    .target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
