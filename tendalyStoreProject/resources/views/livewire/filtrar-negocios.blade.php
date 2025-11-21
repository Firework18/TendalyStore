<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-4 md:p-6">
        <form wire:submit.prevent="leerDatosFormulario" class="flex flex-col md:flex-row gap-4 items-center">

            <!-- Input Buscador -->
            <div class="flex-1 w-full relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i
                        class="bi bi-search text-gray-400 group-focus-within:text-[var(--color-primary)] transition-colors"></i>
                </div>
                <input type="text" id="search-input" wire:model.live.debounce.500ms='termino'
                    placeholder="¿Qué estás buscando hoy?"
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent focus:bg-white transition-all text-gray-700 placeholder-gray-400 outline-none" />
            </div>

            <!-- Select Categoría -->
            <div class="w-full md:w-1/3 relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i
                        class="bi bi-grid text-gray-400 group-focus-within:text-[var(--color-primary)] transition-colors"></i>
                </div>
                <select wire:model.live='categoria' id="category-select"
                    class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent focus:bg-white transition-all text-gray-700 outline-none appearance-none cursor-pointer">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <!-- Flecha custom para el select -->
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <i class="bi bi-chevron-down text-xs text-gray-500"></i>
                </div>
            </div>

            <!-- Botón Buscar (Opcional si usas wire:model.live, pero útil para UX) -->
            <button type="submit"
                class="w-full md:w-auto bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-red-600/30 transition-all duration-300 transform hover:-translate-y-0.5">
                Buscar
            </button>
        </form>
    </div>
</div>
