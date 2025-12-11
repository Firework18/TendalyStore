<div class="bg-white p-8 rounded-xl shadow-lg max-w-3xl mx-auto">
    <form novalidate enctype="multipart/form-data" wire:submit.prevent='editarProducto'>
        <div class="mb-5">
            <label for="nombre" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Nombre
            </label>
            <input type="text" id="nombre" wire:model="nombre" placeholder="Nombre del producto"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('nombre') }}">
            @error('nombre')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="mb-5">
            <label for="descripcion" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Descripción
            </label>
            <textarea id="descripcion" wire:model="descripcion" placeholder="Descripción del producto"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="mb-5">
            <label for="precio" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Precio
            </label>
            <input type="number" id="precio" wire:model="precio" placeholder="Ej: 2.0, 50.0"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('precio') }}">
            @error('precio')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="mb-5">
            <label for="precio_oferta" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Precio Oferta
            </label>
            <input type="number" id="precio_oferta" wire:model="precio_oferta"
                placeholder="Ej: 2.0, 50.0 (Puedes dejarlo vacío)"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('precio_oferta') }}">
        </div>

        <div class="mb-5">
            <label for="stock" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Stock
            </label>
            <input type="number" id="stock" wire:model="stock" placeholder="Ej: 1, 2, 3"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ old('stock') }}">
            @error('stock')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="mb-5">
            <label for="unidad_medida" class="mb-2 block uppercase text-gray-700 font-bold text-sm">
                Unidad de Medida <span class="text-red-500">*</span>
            </label>

            <select id="unidad_medida" wire:model="unidad_medida"
                class="border border-gray-300 p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">

                <option value="">Selecciona una unidad</option>
                <option value="unidad" {{ old('unidad_medida') == 'unidad' ? 'selected' : '' }}>Unidad</option>
                <option value="kg" {{ old('unidad_medida') == 'kg' ? 'selected' : '' }}>Kilogramo (kg)</option>
                <option value="g" {{ old('unidad_medida') == 'g' ? 'selected' : '' }}>Gramo (g)</option>
                <option value="lt" {{ old('unidad_medida') == 'lt' ? 'selected' : '' }}>Litro (lt)</option>
                <option value="ml" {{ old('unidad_medida') == 'ml' ? 'selected' : '' }}>Mililitro (ml)</option>
                <option value="m" {{ old('unidad_medida') == 'm' ? 'selected' : '' }}>Metro (m)</option>
                <option value="cm" {{ old('unidad_medida') == 'cm' ? 'selected' : '' }}>Centímetro (cm)</option>
                <option value="paquete" {{ old('unidad_medida') == 'paquete' ? 'selected' : '' }}>Paquete</option>
                <option value="caja" {{ old('unidad_medida') == 'caja' ? 'selected' : '' }}>Caja</option>
                <option value="par" {{ old('unidad_medida') == 'par' ? 'selected' : '' }}>Par</option>
                <option value="docena" {{ old('unidad_medida') == 'docena' ? 'selected' : '' }}>Docena</option>
                <option value="bolsa" {{ old('unidad_medida') == 'bolsa' ? 'selected' : '' }}>Bolsa</option>
                <option value="rollo" {{ old('unidad_medida') == 'rollo' ? 'selected' : '' }}>Rollo</option>
                <option value="kit" {{ old('unidad_medida') == 'kit' ? 'selected' : '' }}>Kit</option>
            </select>

            @error('unidad_medida')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <div class="mb-5 mt-8 p-6 border-t border-gray-200">
            <h3 class="text-xl font-semibold text-gray-700 mb-4 text-center">Imagen del Producto</h3>
            <p class="text-gray-500 text-sm mb-4 text-center">Sube una imagen para tu producto. Formato: JPG, PNG.
                Tamaño máximo: 2MB.</p>
            <label for="imagen_nueva" class="mb-2 block uppercase text-gray-700 font-bold text-sm sr-only">
                Seleccionar Imagen
            </label>
            <div class="flex items-center justify-center w-full">
                <label for="imagen_nueva"
                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a3 3 0 013 3v10a2 2 0 01-2 2H7a2 2 0 01-2-2v-2m3-4l4-4m0 0l4 4m-4-4v12">
                            </path>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Haz click para subir</span> o
                            arrastra y suelta</p>
                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                    </div>
                    <input id="imagen_nueva" wire:model="imagen_nueva" type="file" class="hidden"
                        accept=".jpg,.jpeg,.png" />
                </label>
            </div>

            <div class="my-5">
                @if ($imagen)
                    Vista previa de la imágen actual:
                    <img src="{{ asset('storage/productos/' . $imagen) }}" class="mb-5"
                        alt="{{ 'Imagen producto' . $nombre }}">
                @endif
                @if ($imagen_nueva)
                    Vista previa de la nueva imágen:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}">
                @endif
            </div>

            @error('imagen_nueva')
                <livewire:mostrar-alerta :message="$message">
                @enderror

        </div>

        <input type="submit" value="Guardar Cambios"
            class="bg-red-600 hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-6">
    </form>
</div>
