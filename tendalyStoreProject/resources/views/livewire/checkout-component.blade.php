<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Encabezado -->
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-3xl font-extrabold text-gray-900">Finalizar compra en <a
                href="{{ route('negocio.show', $negocio->nombre) }}"
                class="text-red-600 font-bold hover:text-red-700 transition">{{ $negocio->nombre }}</a>
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- COLUMNA IZQUIERDA: Formularios -->
        <div class="lg:col-span-7 space-y-8">

            <!-- SECCIÓN 1: MÉTODO DE ENTREGA (Solo si el negocio tiene delivery) -->
            @if ($negocio->envio_disponible)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Método de Entrega</h2>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="tipo_entrega" value="delivery" class="peer hidden">
                            <div
                                class="peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-800 border border-gray-200 rounded-xl p-4 text-center hover:bg-gray-50 transition duration-200 h-full flex flex-col justify-center">
                                <span class="block font-bold text-lg">Delivery</span>
                                <span class="text-xs opacity-80">Envío a domicilio</span>
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer group">
                            <input type="radio" wire:model.live="tipo_entrega" value="recojo" class="peer hidden">
                            <div
                                class="peer-checked:border-red-600 peer-checked:bg-red-50 peer-checked:text-red-800 border border-gray-200 rounded-xl p-4 text-center hover:bg-gray-50 transition duration-200 h-full flex flex-col justify-center">
                                <span class="block font-bold text-lg">Recojo en Tienda</span>
                                <span class="text-xs opacity-80">Sin costo de envío</span>
                            </div>
                        </label>
                    </div>
                </div>
            @endif

            <!-- SECCIÓN 2: DIRECCIONES (Lógica: Solo si es delivery y el negocio tiene delivery) -->
            @if ($tipo_entrega == 'delivery' && $negocio->envio_disponible)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 animate-fade-in">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            📍 Dirección de Entrega
                        </h2>

                        <!-- Toggle: Mis Direcciones vs Nueva -->
                        @if ($direccionesUsuario->count() > 0)
                            <button wire:click="$toggle('usar_direccion_guardada')"
                                class="text-sm text-red-600 font-bold hover:text-red-800 underline transition">
                                {{ $usar_direccion_guardada ? '+ Nueva dirección' : 'Ver mis guardadas' }}
                            </button>
                        @endif
                    </div>

                    <!-- CASO A: USAR DIRECCIONES GUARDADAS -->
                    @if ($direccionesUsuario->count() > 0 && $usar_direccion_guardada)
                        <div class="space-y-3">
                            @foreach ($direccionesUsuario as $dir)
                                <label
                                    class="flex items-start p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition duration-200 {{ $direccion_seleccionada_id == $dir->id ? 'border-red-500 bg-red-50 ring-1 ring-red-500' : 'border-gray-200' }}">
                                    <input type="radio" wire:model.live="direccion_seleccionada_id"
                                        value="{{ $dir->id }}" class="mt-1 mr-4 text-red-600 focus:ring-red-500">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="font-bold text-gray-900">{{ $dir->nombre }}</span>
                                            @if ($dir->es_principal)
                                                <span
                                                    class="text-[10px] uppercase font-bold bg-gray-200 px-2 py-0.5 rounded-full text-gray-600">Principal</span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-700">{{ $dir->direccion }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Ref: {{ $dir->referencia }} • 📞
                                            {{ $dir->telefono }}</p>
                                    </div>
                                </label>
                            @endforeach
                            @error('direccion_seleccionada_id')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>

                        <!-- CASO B: FORMULARIO NUEVA DIRECCIÓN -->
                    @else
                        <div class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alias (Ej: Casa,
                                        Oficina) *</label>
                                    <input wire:model="nombre" type="text"
                                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                    @error('nombre')
                                        <livewire:mostrar-alerta :message="$message" />
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Teléfono de contacto
                                        *</label>
                                    <input wire:model="telefono" type="text"
                                        class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                    @error('telefono')
                                        <livewire:mostrar-alerta :message="$message" />
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Dirección Exacta *</label>
                                <input wire:model="direccion" type="text" placeholder="Av. Principal 123, Urb..."
                                    class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                                @error('direccion')
                                    <livewire:mostrar-alerta :message="$message" />
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Referencia
                                    (Opcional)</label>
                                <input wire:model="referencia" type="text" placeholder="Frente al parque..."
                                    class="w-full rounded-lg border-gray-300 focus:ring-red-500 focus:border-red-500 shadow-sm transition">
                            </div>

                            <!-- Checkbox Guardar -->
                            @if ($direccionesUsuario->count() < 3)
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <label class="flex items-center cursor-pointer">
                                        <input wire:model="guardar_direccion" type="checkbox"
                                            class="rounded text-red-600 focus:ring-red-500 mr-3 h-5 w-5">
                                        <span class="text-sm font-medium text-gray-700">Guardar esta dirección para
                                            futuras compras</span>
                                    </label>

                                    @if ($guardar_direccion)
                                        <div class="mt-3 ml-8 animate-fade-in">
                                            <label class="flex items-center cursor-pointer">
                                                <input wire:model="es_principal" type="checkbox"
                                                    class="rounded text-red-600 focus:ring-red-500 mr-2">
                                                <span class="text-xs text-gray-600 font-medium">Establecer como
                                                    dirección principal</span>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div
                                    class="flex items-center gap-2 text-xs text-amber-700 bg-amber-50 p-3 rounded-lg border border-amber-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Ya tienes 3 direcciones guardadas. Esta se usará solo para este pedido.
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Mensaje Informativo si NO es Delivery -->
            @elseif(!$negocio->envio_disponible)
                <div
                    class="bg-blue-50 border border-blue-200 p-4 rounded-2xl text-blue-800 text-sm flex gap-3 items-center">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Información</p>
                        <p>Este negocio solo acepta <strong>Recojo en Tienda</strong>. No se requiere dirección de
                            envío.</p>
                    </div>
                </div>
            @endif


            <!-- SECCIÓN 3: PAGO YAPE (Tu código integrado) -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <div class="bg-purple-100 p-2 rounded-lg mr-3">
                        <img src="{{ asset('assets/images/logo-yape.png') }}" class="w-8" alt="">
                    </div>
                    Pagar con Yape
                </h2>

                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <!-- QR Section -->
                    <div class="w-full md:w-1/2 bg-red-50 p-6 rounded-2xl text-center border border-red-100">
                        <p class="text-sm font-semibold text-red-800 mb-3">Escanea el QR para pagar</p>

                        <div class="relative inline-block group">
                            @if ($negocio->imagen_qr_yape)
                                <img src="{{ asset('storage/qr_imagenes_negocios/' . $negocio->imagen_qr_yape) }}"
                                    class="w-48 h-48 mx-auto rounded-xl shadow-md mix-blend-multiply transition transform group-hover:scale-105">
                            @else
                                <div
                                    class="w-48 h-48 mx-auto bg-white border-2 border-dashed border-gray-300 flex items-center justify-center rounded-xl text-gray-400 font-medium">
                                    Sin QR configurado
                                </div>
                            @endif
                        </div>

                        <div class="mt-4 inline-block bg-white px-4 py-2 rounded-lg shadow-sm border border-red-100">
                            <p class="text-sm text-gray-500">Monto a pagar</p>
                            <p class="text-2xl font-extrabold text-gray-900">S/. {{ number_format($total, 2) }}</p>
                        </div>
                    </div>

                    <!-- Upload Section -->
                    <div class="w-full md:w-1/2">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Sube la captura (Screenshot)</label>

                        <div class="relative group">
                            <input type="file" wire:model="comprobante" accept="image/*"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer border border-gray-300 rounded-xl bg-white hover:bg-gray-50 transition" />

                            <!-- Preview y Loading -->
                            <div class="mt-3 min-h-[24px]">
                                <span wire:loading wire:target="comprobante"
                                    class="flex items-center gap-2 text-xs text-red-600 font-medium bg-red-50 px-3 py-1 rounded-full w-fit">
                                    <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Subiendo imagen...
                                </span>

                                @if ($comprobante)
                                    <span
                                        class="flex items-center gap-2 text-xs text-green-700 font-bold bg-green-50 px-3 py-1 rounded-full w-fit animate-fade-in border border-green-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Imagen cargada correctamente
                                    </span>

                                    <img class="w-60" src="{{ $comprobante->temporaryUrl() }}">
                                @endif
                            </div>
                            @error('comprobante')
                                <livewire:mostrar-alerta :message="$message" />
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- COLUMNA DERECHA: RESUMEN (Sticky) -->
        <div class="lg:col-span-5">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 sticky top-4">
                <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Resumen del Pedido</h3>

                <!-- Lista de Items -->
                <div class="max-h-[300px] overflow-y-auto mb-6 pr-2 space-y-4 custom-scrollbar">
                    @foreach ($itemsCheckout as $item)
                        <div class="flex gap-3">
                            <div
                                class="w-14 h-14 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0 border border-gray-200">
                                <img src="{{ asset('storage/productos/' . $item->producto->imagen) }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 text-sm">
                                <p class="font-bold text-gray-800 line-clamp-2 leading-tight">
                                    {{ $item->producto->nombre }}</p>
                                <p class="text-gray-500 text-xs mt-1">Cant: {{ $item->cantidad }}</p>
                            </div>
                            <span class="font-bold text-gray-900 text-sm">S/.
                                {{ number_format($item->subtotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Totales -->
                <div class="bg-gray-50 p-4 rounded-xl space-y-3 mb-6">
                    <div class="flex justify-between text-gray-600 text-sm">
                        <span>Subtotal Productos</span>
                        <span class="font-medium">S/. {{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between text-gray-600 text-sm items-center">
                        <span>Costo de Envío</span>
                        @if ($costo_envio > 0)
                            <span class="text-gray-900 font-medium">S/. {{ number_format($costo_envio, 2) }}</span>
                        @else
                            <span
                                class="text-green-600 font-bold text-xs bg-green-100 px-2 py-0.5 rounded-full">GRATIS</span>
                        @endif
                    </div>

                    <div
                        class="flex justify-between text-xl font-extrabold text-gray-900 pt-3 border-t border-gray-200 mt-2">
                        <span>Total a Pagar</span>
                        <span>S/. {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <!-- Botón de Confirmación -->
                <button wire:click="procesarCompra" wire:loading.attr="disabled"
                    class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white font-bold py-4 rounded-xl hover:from-red-700 hover:to-red-800 transition duration-300 transform hover:scale-[1.02] shadow-lg shadow-red-500/30 disabled:opacity-50 disabled:cursor-not-allowed flex justify-center items-center gap-2">
                    <span wire:loading.remove>Confirmar Pedido</span>
                    <span wire:loading class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Procesando...
                    </span>
                </button>

            </div>
        </div>
    </div>
</div>
