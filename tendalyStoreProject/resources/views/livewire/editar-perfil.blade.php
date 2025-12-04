<div>
    <form wire:submit.prevent='editarPerfil' enctype="multipart/form-data" novalidate>
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8">

            <!-- Columna Izquierda (Datos Principales) -->
            <div class="md:col-span-8 space-y-6">
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">Datos de
                        Cuenta</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nombre de
                                Usuario</label>
                            <input type="text" name="username" id="username" wire:model='username'
                                value="{{ old('username', auth()->user()->username) }}"
                                class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5"
                                required>
                            @error('username')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" wire:model='email'
                                value="{{ old('email', auth()->user()->email) }}"
                                class="block w-full rounded-lg border-gray-200 bg-gray-100 text-gray-500 shadow-sm sm:text-sm py-2.5 cursor-not-allowed"
                                disabled>
                            <p class="text-xs text-gray-400 mt-1">El email no se puede modificar.</p>
                        </div>

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" name="name" id="name" wire:model='name'
                                value="{{ old('name', auth()->user()->name) }}"
                                class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5"
                                required>
                            @error('name')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>

                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="tel" name="telefono" id="telefono" wire:model='telefono'
                                value="{{ old('telefono', auth()->user()->telefono) }}"
                                class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5">
                            @error('telefono')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>

                        <div>
                            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-1">Apellido
                                Paterno</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno"
                                wire:model='apellido_paterno'
                                value="{{ old('apellido_paterno', auth()->user()->apellido_paterno) }}"
                                class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5">
                            @error('apellido_paterno')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>

                        <div>
                            <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-1">Apellido
                                Materno</label>
                            <input type="text" name="apellido_materno" id="apellido_materno"
                                wire:model='apellido_materno'
                                value="{{ old('apellido_materno', auth()->user()->apellido_materno) }}"
                                class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm py-2.5">
                            @error('apellido_materno')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                        Información Detallada</h4>
                    <div class="space-y-4">

                        <div>
                            <label for="informacion" class="block text-sm font-medium text-gray-700 mb-1">Bio
                                / Información Adicional</label>
                            <textarea name="informacion" id="informacion" rows="4" wire:model='informacion'
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm"
                                placeholder="Cuéntanos un poco sobre ti...">{{ old('informacion', auth()->user()->informacion) }}</textarea>
                            @error('informacion')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha (Imagen y Acción) -->
            <div class="md:col-span-4 space-y-6">
                <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm sticky top-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Actualizar Foto</h4>
                    <label for="imagen_nueva" class="block w-full">
                        <span class="sr-only">Elige foto de perfil</span>
                        <input type="file" id="imagen_nueva" name="imagen" accept=".jpg, .jpeg, .png"
                            wire:model='imagen_nueva'
                            class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-red-50 file:text-red-700
                                        hover:file:bg-red-100
                                        cursor-pointer transition-colors
                                    " />
                    </label>
                    <p class="text-xs text-gray-500 mt-2">JPG, PNG o JPEG. Máx 2MB.</p>

                    @error('imagen_nueva')
                        <livewire:mostrar-alerta :message="$message">
                        @enderror

                        <div class="my-5 w-40">
                            @if ($imagen_nueva)
                                Vista previa de la nueva imágen:
                                <img src="{{ $imagen_nueva->temporaryUrl() }}">
                            @endif
                        </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <input type="submit" value="Guardar Cambios"
                        class="w-full cursor-pointer flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:-translate-y-0.5" />
                </div>

            </div>

        </div>
    </form>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('perfilEditado', (data) => {
                Swal.fire({
                    icon: data.type,
                    title: data.message,
                    text: data.text,
                    showConfirmButton: true,
                    confirmButtonColor: "#d33",
                    timer: 2500,
                });
            });
        });
    </script>
@endpush
