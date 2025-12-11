<div class="w-full">


    <div class="relative flex items-center w-full group">
        <form wire:submit.prevent="leerDatosFormulario"
            class="flex flex-col lg:flex-row gap-4 items-stretch lg:items-center">
            {{-- Icono Lupa --}}
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <input wire:model.live.debounce.300ms="termino" type="text"
                class="block w-full h-12 pl-12 pr-4 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm placeholder-gray-400 transition-all"
                placeholder="Buscar producto">

            <div class="w-full lg:w-auto">
                <button type="submit"
                    class="w-full lg:w-auto h-12 inline-flex items-center justify-center px-6 text-sm font-bold text-white bg-red-600 rounded-xl hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-200 transition-all shadow-md transform active:scale-95 gap-2">
                    <span>Buscar</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </button>
            </div>
        </form>

    </div>
</div>
