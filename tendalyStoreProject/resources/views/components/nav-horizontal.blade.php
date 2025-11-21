<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" @click.outside="open = false" type="button"
        class="flex items-center justify-center w-10 h-10 rounded-full text-red-700 hover:bg-gray-100 hover:text-red-600 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        <i class="bi bi-person-circle text-2xl"></i>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-64 origin-top-right bg-white rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
        style="display: none;">

        @auth
            <div class="px-5 py-4 bg-gray-50 border-b border-gray-100 flex items-center gap-3">
                <div class="bg-red-100 text-red-600 w-10 h-10 rounded-full flex items-center justify-center shrink-0">
                    <img src="{{ auth()->user()->imagen ? asset('perfiles/' . auth()->user()->imagen) : asset('assets/images/default-profile.png') }}"
                        class="w-full h-full rounded-full object-cover">
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Hola,</p>
                    <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->username ?? 'Usuario' }}</p>
                </div>
            </div>

            <div class="py-1">
                <a href="{{ route('dashboard.perfil') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-person-vcard mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Mi perfil
                </a>
                <a href="{{ route('dashboard') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-speedometer2 mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Dashboard
                </a>
                <a href="{{ route('dashboard.negocio') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-shop mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Visitar Negocio
                </a>
                <a href="{{ route('carrito.index') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-cart mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Tu carrito
                </a>
            </div>
            <div class="py-1 border-t border-gray-100">
                <a href="#"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-gear mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Configuración
                </a>
            </div>
            <div class="py-1 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="group flex w-full items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition text-left">
                        <i class="bi bi-box-arrow-right mr-3 text-red-400 group-hover:text-red-600"></i>
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        @endauth

        @guest
            <div class="py-1 border-t border-gray-100">
                <a href="{{ route('login') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-person mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-person-plus mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Crear Cuenta
                </a>
            </div>
        @endguest
    </div>
</div>
