<div class="w-full">

    @if ($direcciones->isEmpty())
        <div
            class="flex flex-col items-center justify-center py-16 px-4 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 text-center">
            <div class="bg-red-100 p-4 rounded-full mb-4">
                <i class="bi bi-geo-alt text-4xl text-red-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Sin direcciones registradas</h3>
            <p class="text-gray-500 max-w-sm mb-6">
                Aún no has agregado ninguna dirección. Agrega una para recibir tus pedidos.
            </p>

            <a href="{{ route('direcciones.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-red-700 hover:bg-red-800 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm">
                <i class="bi bi-plus-lg mr-2"></i>
                Agregar nueva dirección
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($direcciones as $direccion)
                <div
                    class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200 relative overflow-hidden group flex flex-col h-full">

                    <div class="h-1 w-full bg-red-700"></div>

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-2 overflow-hidden">
                                <div class="bg-gray-100 p-1.5 rounded-full text-gray-500 shrink-0">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <h4 class="font-bold text-gray-800 text-lg truncate" title="{{ $direccion->nombre }}">
                                    {{ $direccion->nombre }}
                                </h4>
                            </div>

                            @if ($direccion->es_principal)
                                <span
                                    class="shrink-0 bg-red-100 text-red-700 text-[10px] uppercase font-bold px-2 py-1 rounded-full border border-red-200 tracking-wide">
                                    Principal
                                </span>
                            @endif
                        </div>

                        <div class="space-y-3 mb-4 flex-1">

                            <div class="flex items-start">
                                <i class="bi bi-geo-alt-fill text-red-600 mt-1 mr-2.5 text-sm shrink-0"></i>
                                <p class="text-sm text-gray-600 leading-snug">
                                    {{ $direccion->direccion }}
                                </p>
                            </div>

                            @if (!empty($direccion->referencia))
                                <div class="flex items-start">
                                    <i class="bi bi-info-circle-fill text-gray-400 mt-1 mr-2.5 text-sm shrink-0"></i>
                                    <p class="text-sm text-gray-500 italic leading-snug">
                                        "{{ $direccion->referencia }}"
                                    </p>
                                </div>
                            @endif

                            <div class="flex items-center pt-1">
                                <i class="bi bi-telephone-fill text-gray-700 mr-2.5 text-sm shrink-0"></i>
                                <p class="text-sm text-gray-800 font-medium">
                                    {{ $direccion->telefono }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-auto">
                            <a href="{{ route('direcciones.edit', $direccion->id) }}"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center transition-colors px-2 py-1 rounded hover:bg-blue-50">
                                <i class="bi bi-pencil-square mr-1.5"></i> Editar
                            </a>
                            <button type="button"
                                wire:click="$dispatch('mostrarAlerta',{direccion:{{ $direccion }}})"
                                class="text-red-500 hover:text-red-700 text-sm font-medium flex items-center transition-colors px-2 py-1 rounded hover:bg-red-50">
                                <i class="bi bi-trash mr-1.5"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($direcciones->count() < 3)
                <a href="{{ route('direcciones.create') }}"
                    class="group flex flex-col items-center justify-center min-h-[260px] bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl hover:border-red-500 hover:bg-red-50 transition-all duration-300 cursor-pointer h-full">
                    <div
                        class="bg-white p-4 rounded-full shadow-sm group-hover:scale-110 group-hover:shadow-md transition-all duration-300">
                        <i class="bi bi-plus-lg text-3xl text-gray-400 group-hover:text-red-600"></i>
                    </div>
                    <span class="mt-4 font-semibold text-gray-600 group-hover:text-red-700">Agregar nueva
                        dirección</span>
                    <span class="text-xs text-gray-400 mt-1">({{ $direcciones->count() }}/3 utilizadas)</span>
                </a>
            @endif

        </div>

        @if ($direcciones->count() >= 3)
            <div
                class="mt-6 border-l-4 border-blue-500 bg-blue-50 text-blue-800 p-4 rounded-r-lg flex items-start shadow-sm">
                <i class="bi bi-info-circle-fill mr-3 mt-0.5 text-lg"></i>
                <div>
                    <p class="font-bold text-sm">Límite alcanzado</p>
                    <p class="text-sm mt-1">Has llegado al máximo de 3 direcciones. Si necesitas agregar una distinta,
                        por favor elimina o edita alguna de las existentes.</p>
                </div>
            </div>
        @endif

    @endif
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('mensaje'))
        <script>
            Swal.fire({
                icon: 'success',
                timer: 2500,
                title: "{{ session('mensaje') }}",
                showConfirmButton: true
            });
        </script>
    @endif

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (direccion) => {
                Swal.fire({
                    title: "¿Está seguro?",
                    text: "Una dirección eliminada no se puede recuperar.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, elimínala.",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar', direccion);
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "La dirección ha sido eliminada correctamente",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
