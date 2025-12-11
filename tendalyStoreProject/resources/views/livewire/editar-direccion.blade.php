<div class="max-w-4xl mx-auto">
    <form wire:submit.prevent='editarDireccion' method="POST" class="space-y-6" novalidate>
        @csrf

        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">

            <div class="mb-6 border-b border-gray-100 pb-4">
                <h3 class="text-lg font-medium text-gray-900 flex items-center">
                    <i class="bi bi-card-text text-red-600 mr-2"></i>
                    Datos de contacto y ubicación
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="col-span-1">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">
                        Nombre / Alias <span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="nombre" id="nombre" value="{{ old('nombre') }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition duration-200 @error('nombre') border-red-500 @enderror"
                        placeholder="Ej: Mi Casa, Oficina, Juan Pérez" required>

                    @error('nombre')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">
                        Teléfono de contacto <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" wire:model="telefono" id="telefono" value="{{ old('telefono') }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition duration-200 @error('telefono') border-red-500 @enderror"
                        placeholder="Ej: 999 123 456" required>

                    @error('telefono')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">
                        Dirección exacta <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-geo-alt text-gray-400"></i>
                        </div>
                        <input type="text" wire:model="direccion" id="direccion" value="{{ old('direccion') }}"
                            class="pl-10 w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition duration-200 @error('direccion') border-red-500 @enderror"
                            placeholder="Calle, número, manzana, lote, etc." required>
                    </div>

                    @error('direccion')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="referencia" class="block text-sm font-medium text-gray-700 mb-1">
                        Referencia <span class="text-gray-400 text-xs font-normal">(Opcional)</span>
                    </label>
                    <textarea wire:model="referencia" id="referencia" rows="2"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 transition duration-200"
                        placeholder="Ej: Portón negro, frente al parque, al lado de la tienda...">{{ old('referencia') }}</textarea>
                    @error('referencia')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2 mt-2">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            {{-- Input oculto para enviar '0' si no está marcado (opcional, depende de tu controlador) --}}
                            <input type="hidden" wire:model="es_principal" value="0">

                            <input id="es_principal" type="checkbox" wire:model="es_principal"
                                class="h-4 w-4 text-red-600 border-gray-300 rounded cursor-pointer">

                        </div>
                        <div class="ml-3 text-sm">
                            <label for="es_principal" class="font-medium text-gray-700 cursor-pointer">
                                Establecer como dirección principal
                            </label>
                            <p class="text-gray-500">Esta dirección se seleccionará automáticamente en tus nuevas
                                compras.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 mt-6">
            <a href="{{ route('direcciones.index') }}"
                class="px-4 py-2 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors text-sm font-medium">
                Cancelar
            </a>

            <button type="submit"
                class="px-6 py-2 bg-red-700 border border-transparent rounded-md shadow-sm text-white hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors text-sm font-medium flex items-center">
                <i class="bi bi-save mr-2"></i>
                Guardar Dirección
            </button>
        </div>

    </form>
</div>
