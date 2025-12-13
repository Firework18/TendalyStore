<div>
    <form method="POST" wire:submit.prevent='crearNegocio' enctype="multipart/form-data" novalidate>
        @csrf
        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Información Básica del Negocio</h3>
            </div>
            <p class="text-gray-600 mb-4">Cuéntanos sobre tu negocio sostenible</p>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-semibold mb-2">Nombre del Negocio
                    <span class="text-red-500">*</span></label>
                <input type="text" wire:model="nombre" id="nombre"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('nombre')
                border-red-500    
                @enderror"
                    value="{{ old('nombre') }}" placeholder="Ej: Eco Productos Naturales">
                @error('nombre')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 text-sm font-semibold mb-2">Descripción del
                    Negocio</label>
                <textarea id="descripcion" wire:model="descripcion"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green h-24 resize-none @error('descripcion')
                border-red-500    
                @enderror"
                    placeholder="Describe tu negocio, tus productos y qué te hace único...">{{ old('descripcion') }}</textarea>
                <p class="text-right text-gray-500 text-sm mt-1">500 caracteres máx</p>
                @error('descripcion')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>

            <div class="mb-4">
                <label for="historia" class="block text-gray-700 text-sm font-semibold mb-2">Historia del
                    Negocio</label>
                <textarea id="historia" wire:model="historia"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green h-24 resize-none @error('historia')
                border-red-500    
                @enderror"
                    placeholder="Describe tu la historia de tu negocio...">{{ old('historia') }}</textarea>
                <p class="text-right text-gray-500 text-sm mt-1">500 caracteres máx</p>
                @error('historia')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria_negocio_id" class="block text-gray-700 text-sm font-semibold mb-2">Categoría
                    <span class="text-red-500">*</span></label>
                <select id="categoria_negocio_id" wire:model="categoria_negocio_id"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('categoria_negocio_id')
                border-red-500    
                @enderror">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_negocio_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_negocio_id')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    Palabras que describen tu negocio (máx. 5)
                </label>

                <p class="text-gray-600 mb-2 text-sm">
                    Selecciona hasta 5 características que representen a tu negocio
                </p>

                <div class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <button type="button" wire:click="toggleTag({{ $tag->id }})"
                            class="px-3 py-1 rounded-full text-white text-sm transition 
                       @if (in_array($tag->id, $tagsSeleccionados)) ring-2 ring-offset-2 ring-tendaly-green
                       @else
                           opacity-80 hover:opacity-100 @endif"
                            style="background-color: {{ $tag->color }};">
                            {{ $tag->nombre }}
                        </button>
                    @endforeach
                </div>

                @error('selectedTags')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>

        </section>

        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Dirección y Ubicación</h3>
            </div>

            <div class="mb-4">
                <label for="ubicacion" class="block text-gray-700 text-sm font-semibold mb-2">Dirección Completa
                    <span class="text-red-500">*</span></label>
                <input type="text" wire:model="ubicacion" id="ubicacion"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('ubicacion')
                border-red-500    
                @enderror"
                    placeholder="Calle, número, urbanización...">
                @error('ubicacion')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="departamento_id" class="block text-gray-700 text-sm font-semibold mb-2">Departamento
                        <span class="text-red-500">*</span></label>
                    <select id="departamento_id" wire:model="departamento_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('departamento_id')
                         border-red-500    
                    @enderror">
                        <option value="">Selecciona departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                        @livewire('mostrar-alerta', ['message' => $message])
                    @enderror
                </div>
                <div>
                    <label for="provincia_id" class="block text-gray-700 text-sm font-semibold mb-2">Provincia
                        <span class="text-red-500">*</span></label>
                    <select id="provincia_id" wire:model="provincia_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('provincia_id')
                         border-red-500    
                    @enderror"
                        disabled>
                        <option value="">Selecciona provincia</option>
                    </select>
                    @error('provincia_id')
                        @livewire('mostrar-alerta', ['message' => $message])
                    @enderror
                </div>
            </div>

            <div>
                <label for="distrito_id" class="block text-gray-700 text-sm font-semibold mb-2">Distrito</label>
                <select id="distrito_id" wire:model="distrito_id"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('distrito_id')
                         border-red-500    
                    @enderror"
                    disabled>
                    <option value="">Selecciona distrito</option>
                </select>
                @error('distrito_id')
                    @livewire('mostrar-alerta', ['message' => $message])
                @enderror
            </div>
        </section>

        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 6h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Datos de Contacto del Negocio</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="correo" class="block text-gray-700 text-sm font-semibold mb-2">Email del Negocio
                        <span class="text-red-500">*</span></label>
                    <input type="email" id="correo" wire:model="correo"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('correo')
                    border-red-500    
                    @enderror"
                        value="{{ old('correo') }}" placeholder="contacto@tunegocio.com">
                    @error('correo')
                        @livewire('mostrar-alerta', ['message' => $message])
                    @enderror
                </div>
                <div>
                    <label for="telefono" class="block text-gray-700 text-sm font-semibold mb-2">Teléfono del
                        Negocio <span class="text-red-500">*</span></label>
                    <input type="tel" id="telefono" wire:model="telefono"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('telefono')
                    border-red-500    
                    @enderror"
                        value="{{ old('telefono') }}" placeholder="+51 999 999 999">
                    @error('telefono')
                        @livewire('mostrar-alerta', ['message' => $message])
                    @enderror
                </div>
            </div>
        </section>

        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="mb-5 mt-8 p-6 border-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 text-center">Imagen del Negocio</h3>
                <p class="text-gray-500 text-sm mb-4 text-center">Sube una imagen para tu producto. Formato: JPG, PNG.
                    Tamaño máximo: 2MB.</p>
                <label for="imagen" class="mb-2 block uppercase text-gray-700 font-bold text-sm sr-only">
                    Seleccionar Imagen
                </label>
                <div class="flex items-center justify-center w-full">
                    <label for="imagen"
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a3 3 0 013 3v10a2 2 0 01-2 2H7a2 2 0 01-2-2v-2m3-4l4-4m0 0l4 4m-4-4v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Haz click para
                                    subir</span> o arrastra y suelta</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                        </div>
                        <input id="imagen" wire:model="imagen" type="file" class="hidden"
                            accept=".jpg,.jpeg,.png" />
                    </label>
                </div>

                <div class="my-5 w-4/6">
                    @if ($imagen)
                        Vista previa de la imágen:
                        <img src="{{ $imagen->temporaryUrl() }}">
                    @endif
                </div>

                @error('imagen')
                    <livewire:mostrar-alerta :message="$message">
                    @enderror

            </div>
        </section>

        <div class="flex flex-col md:flex-row md:justify-end md:space-x-4 space-y-4 md:space-y-0 mb-8">
            <a href="{{ route('dashboard') }}"
                class="px-6 py-2 border bg-red-500 border-gray-300 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-gray-300 text-center">
                Cancelar
            </a>

            <input type="submit" value="Crear Negocio"
                class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-tendaly-green focus:ring-opacity-50 flex items-center space-x-2">
        </div>
    </form>
</div>
