<div class="md:w-1/2 p-6 flex flex-col justify-between">
            
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h1>

                <div class="mb-4">
                    @if ($producto->precio_oferta)
                        <p class="text-xl text-gray-500 line-through mr-2">${{ number_format($producto->precio, 2) }}</p>
                        <p class="text-3xl font-extrabold text-red-600">${{ number_format($producto->precio_oferta, 2) }} <span class="text-base text-gray-500 font-normal">Oferta</span></p>
                    @else
                        <p class="text-3xl font-extrabold text-gray-800">${{ number_format($producto->precio, 2) }}</p>
                    @endif
                </div>

                <div class="mb-6 text-gray-700 leading-relaxed">
                    <h3 class="font-semibold text-xl mb-2">Descripción:</h3>
                    <p>{{ $producto->descripcion }}</p>
                </div>
                
                @if ($producto->unidad_medida)
                    <div class="mb-6">
                        <h3 class="font-semibold text-xl mb-2">Detalles Adicionales:</h3>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Unidad de Medida: {{ $producto->unidad_medida }}</li>
                        </ul>
                    </div>
                @endif

                <!-- Mensaje Adicional -->
               
                <div class="flex items-center space-x-2 mb-4">
                    <i class="bi bi-cart text-xl text-gray-700"></i>
                        <span class="text-sm text-gray-600">
                            En tu carrito: <strong>{{ $totalCarrito }}</strong> producto(s)
                        </span>        
                </div>
                
                @if ($producto->stock>0)
                    <div class="mb-6">
                    <h3 class="font-semibold text-xl mb-2">Cantidad:</h3>
                    <div class="flex items-center space-x-3"
                        x-data="{
                            cantidad: @entangle('cantidad')
                        }">
                        <button class="bg-gray-300 text-gray-700 disabled:bg-opacity-50 hover:disabled:bg-opacity-50 hover:bg-gray-300 rounded-full w-9 h-9 flex items-center justify-center focus:outline-none"
                            x-on:click="cantidad = cantidad - 1"
                            x-bind:disabled="cantidad == 1   ">
                            <i class="bi bi-dash text-xl"></i>
                        </button>
                        <span x-text="cantidad" class="inline-block w-2 text-center"></span>
                        <button class="bg-gray-300 text-gray-700 disabled:bg-opacity-50 hover:disabled:bg-opacity-50 hover:bg-gray-300 rounded-full w-9 h-9 flex items-center justify-center focus:outline-none"
                            x-on:click="cantidad = cantidad + 1"
                            x-bind:disabled="cantidad == {{$producto->stock}}">
                            <i class="bi bi-plus text-xl"></i>
                        </button>
                    </div>
                </div>
                
            <div class="mt-auto">
                <button 
                    wire:click="agregar"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 ease-in-out flex items-center justify-center">
                    <i class="bi bi-cart-plus mr-3 text-2xl"></i>
                    Agregar al Carrito
                </button>
            </div>
                @else
                <div class="mb-6">
                    <h3 class="font-semibold text-xl mb-2">Cantidad:</h3>
                    <div class="flex items-center space-x-3">
                        
                        <span class="inline-block text-center font-bold text-red-500">{{(auth()->user()->negocios->id  === $producto->negocio_id ? 'USTED ES EL DUEÑO' : 'PRODUCTO AGOTADO') }}</span>
                        
                    </div>
                </div>
                @endif
                
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('livewire:init', () => {
    Livewire.on('mostrar-alerta', (data) => {
        Swal.fire({
            icon: data.type,
            title: data.message,
            showConfirmButton: true,
            timer: 2500,
        });
    });
});
</script>
    </script>

@endpush
