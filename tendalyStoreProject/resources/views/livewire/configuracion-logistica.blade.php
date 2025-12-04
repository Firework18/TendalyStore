<div class="max-w-5xl mx-auto">

    <!-- Header simple -->
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Configuración de Logística y Pagos</h2>
        <a href="{{ route('dashboard') }}"
            class="text-sm text-gray-600 hover:text-red-600 font-medium flex items-center transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            Volver
        </a>
    </div>

    <form wire:submit.prevent="guardar">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden relative">
                <div wire:loading wire:target="envio_disponible"
                    class="absolute inset-0 bg-white/50 z-10 flex items-center justify-center">
                    <svg class="animate-spin h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>

                <div class="p-6 border-b border-gray-50 bg-gray-50/50 flex items-center">
                    <div class="bg-blue-100 p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Delivery y Envíos</h3>
                </div>

                <div class="p-8 space-y-6">
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div>
                            <label class="text-sm font-bold text-gray-800 block">Habilitar Servicio de Delivery</label>
                            <span class="text-xs text-gray-500">¿Ofreces envíos a domicilio?</span>
                        </div>

                        <div
                            class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" wire:model.live="envio_disponible" id="envio_disponible"
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer peer checked:right-0 right-6 transition-all duration-300" />
                            <label for="envio_disponible"
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer peer-checked:bg-green-500 transition-colors duration-300"></label>
                        </div>
                    </div>

                    <!-- Input: Costo de Envío -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Costo Estándar (S/)</label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="number" wire:model="costo_envio" step="0.10" min="0"
                                class="block w-full sm:text-sm rounded-lg py-3 pl-4 pr-12 border-gray-300 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-100 disabled:text-gray-400 transition-colors"
                                placeholder="0.00" @if (!$envio_disponible) disabled @endif>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">PEN</span>
                            </div>
                        </div>
                        @error('costo_envio')
                            <livewire:mostrar-alerta :message="$message" />
                        @enderror
                    </div>


                </div>
            </div>

            <!-- SECCIÓN 2: PAGOS (YAPE) -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 bg-gray-50/50 flex items-center">
                    <div class="bg-purple-100 p-2 rounded-lg mr-3">
                        <img src="{{ asset('assets/images/logo-yape.png') }}" class="w-8" alt="">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Pagos con Yape</h3>
                </div>

                <div class="p-8 space-y-6">

                    <!-- Input: Número Yape -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Número Yape</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <input type="number" wire:model="telefono_yape"
                                class="focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg py-3"
                                placeholder="999 999 999">
                        </div>
                        @error('telefono_yape')
                            <livewire:mostrar-alerta :message="$message" />
                        @enderror
                    </div>

                    <!-- Upload QR Yape -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Código QR (Imagen)</label>

                        <div class="flex items-start space-x-6">
                            <!-- Zona de Previsualización -->
                            <div class="shrink-0 relative">
                                @if ($qr_yape_nuevo)
                                    <!-- Previsualización de la NUEVA imagen cargada temporalmente -->
                                    <img src="{{ $qr_yape_nuevo->temporaryUrl() }}"
                                        class="h-32 w-32 object-cover rounded-lg border-2 border-purple-500 p-1 shadow-sm">
                                    <span
                                        class="absolute top-0 right-0 -mt-2 -mr-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full shadow">Nuevo</span>
                                @elseif ($imagen_qr_yape)
                                    <!-- Previsualización de la imagen guardada en BD -->

                                    <img src="{{ asset('storage/qr_imagenes_negocios/' . $imagen_qr_yape) }}"
                                        class="h-32 w-32 object-cover rounded-lg border-2 border-gray-200 p-1">
                                @else
                                    <!-- Placeholder vacío -->
                                    <div
                                        class="h-32 w-32 rounded-lg border-2 border-dashed border-gray-300 flex flex-col items-center justify-center bg-gray-50 text-gray-400">
                                        <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-xs">Sin QR</span>
                                    </div>
                                @endif

                                <!-- Spinner de carga al subir imagen -->
                                <div wire:loading wire:target="qr_yape_nuevo"
                                    class="absolute inset-0 bg-white/80 flex items-center justify-center rounded-lg">
                                    <svg class="animate-spin h-6 w-6 text-purple-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Input File -->
                            <div class="flex-1">
                                <label class="block w-full cursor-pointer group">
                                    <span class="sr-only">Elegir imagen</span>
                                    <input type="file" wire:model="qr_yape_nuevo" accept="image/*"
                                        class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-bold
                                        file:bg-purple-50 file:text-purple-700
                                        group-hover:file:bg-purple-100
                                        transition-all
                                    " />
                                </label>
                                <p class="mt-3 text-xs text-gray-500">
                                    Formatos: JPG, PNG. Máximo 2MB. <br>
                                    Este QR se mostrará al cliente al finalizar la compra.
                                </p>
                            </div>
                        </div>
                        @error('qr_yape_nuevo')
                            <livewire:mostrar-alerta :message="$message" />
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Botón Guardar con estado de carga -->
        <div class="mt-8 flex justify-end">
            <button type="submit" wire:loading.attr="disabled"
                class="inline-flex items-center bg-red-600 hover:bg-red-700 disabled:bg-red-400 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">

                <span wire:loading.remove wire:target="guardar">
                    <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                        </path>
                    </svg>
                    Guardar Configuración
                </span>

                <span wire:loading wire:target="guardar" class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Guardando...
                </span>
            </button>
        </div>
    </form>
</div>

<!-- Integración SweetAlert con Eventos de Livewire -->
@script
    <script>
        Livewire.on('swal:success', (data) => {
            Swal.fire({
                icon: 'success',
                title: data[0].title,
                text: data[0].text,
                timer: 2500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        });
    </script>
@endscript
