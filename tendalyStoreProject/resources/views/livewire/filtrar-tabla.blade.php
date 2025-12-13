<div class="w-full">

    <form wire:submit.prevent="leerDatosFormulario" class="flex flex-col lg:flex-row gap-4 items-stretch lg:items-center">
        <div class="w-full lg:w-64 relative group">

            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>

            <label for="filtro_estado"
                class="absolute top-1.5 left-10 text-[10px] font-bold text-gray-400 uppercase tracking-wider pointer-events-none">
                Filtrar por Estado
            </label>

            <select id="filtro_estado" wire:model.live="estado"
                class="block w-full h-12 pl-10 pr-10 pt-4 pb-1 text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm cursor-pointer hover:border-red-300 hover:bg-white transition-all appearance-none">
                <option value="" class="font-normal text-gray-500">Todos</option>
                @foreach ($estados as $tag)
                    <option value="{{ $tag->nombre }}" class="font-medium text-gray-900">
                        {{ ucfirst($tag->nombre) }}
                    </option>
                @endforeach
            </select>

            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>

        <div class="flex-1 relative group">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <input type="text" wire:model.live.debounce.500ms='termino'
                class="block w-full h-12 pl-12 pr-4 text-sm text-gray-900 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 shadow-sm placeholder-gray-400 transition-all hover:border-gray-300"
                placeholder="Buscar por número de pedido">
        </div>

        <div class="w-full lg:w-auto">
            <button type="submit"
                class="w-full lg:w-auto h-12 inline-flex items-center justify-center px-6 text-sm font-bold text-white bg-red-600 rounded-xl hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-200 transition-all shadow-md transform active:scale-95 gap-2">
                <span>Buscar</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </button>
        </div>
    </form>
</div>
