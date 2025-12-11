<div class="flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="relative w-full max-w-lg text-center">
        <div class="flex justify-center mb-6">
            <div class="relative">
                <div class="absolute inset-0 bg-red-100 rounded-full opacity-75"></div>
                <div class="relative bg-red-50 rounded-full p-5 border border-red-100 shadow-sm">
                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Texto --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-2 tracking-tight">
            ¡Crea tu Negocio Digital!
        </h2>
        <p class="text-gray-500 mb-8 leading-relaxed">
            Para acceder a este módulo necesitas tener una tienda activa en TendalyStore. Es el primer paso para
            empezar a vender.
        </p>

        <a href="{{ route('negocio.create') }}"
            class="group relative w-full inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-white transition-all duration-200 bg-gray-900 border-2 border-transparent rounded-xl hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 shadow-lg hover:shadow-xl hover:-translate-y-1">
            <span class="mr-2">Comenzar Ahora</span>
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                </path>
            </svg>
        </a>
    </div>
</div>
