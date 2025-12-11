@extends('dashboard.user.app')

@section('titulo', 'Gestión de Ventas')
@section('titulo_contenido', 'Administración de Pedidos')
@section('primera_descripcion', 'Supervisa, gestiona y actualiza el flujo de tus ventas recientes.')

@section('contenido')
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">

        <div class="px-6 py-4 border-b border-gray-200 bg-white flex items-center justify-between">
            <div class="flex items-center gap-2">
                <h2 class="text-lg font-semibold text-gray-800">
                    Listado de Pedidos
                </h2>
                <span
                    class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">
                    Recientes
                </span>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <livewire:filtrar-tabla />
        </div>

        <div class="flex-1">
            <livewire:orden-negocio />
        </div>

    </div>

    <div id="imageModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm"
            onclick="closeImageModal()"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                    <div class="absolute top-0 right-0 pt-4 pr-4 z-10">
                        <button type="button" onclick="closeImageModal()"
                            class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <span class="sr-only">Cerrar</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="bg-white p-2">
                        <img id="modalImageSrc" src="" alt="Comprobante"
                            class="w-full h-auto max-h-[85vh] object-contain mx-auto rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openImageModal(src) {
            const modal = document.getElementById('imageModal');
            document.getElementById('modalImageSrc').src = src;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") closeImageModal();
        });
    </script>
@endpush
