<div class="md:hidden" x-data="{ mobileMenuOpen: false }">
    <div x-show="mobileMenuOpen" x-transition.opacity @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/50 z-[55]" style="display: none;">
    </div>

    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-10" @click.outside="mobileMenuOpen = false"
        class="fixed bottom-24 left-4 right-4 bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden z-[60]"
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
        @endauth

        <div class="py-2 max-h-[50vh] overflow-y-auto">
            @auth
                <a href="{{ route('dashboard.perfil') }}"
                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <i class="bi bi-person-vcard text-xl text-gray-400"></i>
                    <span class="font-medium">Mi perfil</span>
                </a>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <i class="bi bi-speedometer2 text-xl text-gray-400"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="{{ route('dashboard.negocio') }}"
                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <i class="bi bi-shop text-xl text-gray-400"></i>
                    <span class="font-medium">Visitar Negocio</span>
                </a>
                <a href="{{ route('carrito.index') }}"
                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-600 transition">
                    <i class="bi bi-cart mr-3 text-gray-400 group-hover:text-red-600"></i>
                    Tu carrito
                </a>

                <div class="h-px bg-gray-100 my-2 mx-5"></div>
            @endauth
            <a href="{{ route('nosotros') }}"
                class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                <i class="bi bi-body-text text-xl text-gray-400"></i>
                <span class="font-medium">Nosotros</span>
            </a>
            <a href="{{ route('catalogo') }}"
                class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                <i class="bi bi-grid text-xl text-gray-400"></i>
                <span class="font-medium">Catálogo</span>
            </a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-5 py-3 text-red-600 hover:bg-red-50 transition-colors">
                        <i class="bi bi-box-arrow-right text-xl"></i>
                        <span class="font-medium">Cerrar sesión</span>
                    </button>
                </form>
            @endauth

            @guest
                <div class="px-5 py-4 text-center bg-gray-50 mb-2">
                    <p class="text-sm text-gray-600 mb-3">Accede para gestionar tus pedidos</p>
                    <a href="{{ route('login') }}"
                        class="block w-full py-2 px-4 bg-red-600 text-white rounded-lg font-bold text-sm hover:bg-red-700 transition">
                        Iniciar Sesión
                    </a>
                </div>

            @endguest
        </div>
    </div>

    <div
        class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-[60] pb-safe">
        <div class="flex items-center justify-around px-2 py-3 h-16">

            <a href="{{ route('catalogo') }}"
                class="flex flex-col items-center gap-1 w-16 p-1 rounded-lg transition {{ request()->routeIs('catalogo') ? 'text-red-600' : 'text-gray-500 hover:text-red-600' }}">
                <i class="bi bi-grid text-xl"></i>
                <span class="text-[10px] font-medium">Catálogo</span>
            </a>

            <a href="{{ route('carrito.index') }}" class="relative group -mt-10">
                <div
                    class="flex items-center justify-center w-14 h-14 rounded-full bg-red-600 text-white shadow-lg shadow-red-600/30 group-hover:bg-red-700 transition transform group-hover:-translate-y-1">
                    <i class="bi bi-cart-fill text-2xl"></i>
                </div>
            </a>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="flex flex-col items-center gap-1 w-16 p-1 rounded-lg transition focus:outline-none"
                :class="mobileMenuOpen ? 'text-red-600' : 'text-gray-500 hover:text-red-600'">
                <i class="bi text-xl" :class="mobileMenuOpen ? 'bi-x-lg' : 'bi-person-circle'"></i>
                <span class="text-[10px] font-medium" x-text="mobileMenuOpen ? 'Cerrar' : 'Perfil'"></span>
            </button>

        </div>
    </div>
</div>
