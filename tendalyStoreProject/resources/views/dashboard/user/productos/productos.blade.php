@extends('dashboard.user.app')

@section('titulo', 'Gestión de Productos')
@section('titulo_contenido', 'Administración de Productos')
@section('primera_descripcion', 'Aquí puedes ver, editar y añadir tus productos.')

@section('contenido')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">

        <livewire:mostrar-productos :negocio="$negocio" />

    </div>
    <div id="deleteModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden opacity-0 transition-opacity duration-300 z-50">
        <div id="deleteModalContent"
            class="bg-white rounded-xl shadow-lg w-96 p-6 text-center transform scale-95 transition-transform duration-300">
            <svg class="mx-auto w-12 h-12 text-red-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.918-.816 1.995-1.851L21 18V6a2 2 0 00-1.851-1.995L19 4H5a2 2 0 00-1.995 1.851L3 6v12a2 2 0 001.851 1.995L5 20z" />
            </svg>
            <h2 class="text-lg font-semibold text-gray-800 mb-2">¿Estás seguro?</h2>
            <p class="text-gray-600 mb-6">Esta acción eliminará el producto (puedes restaurarlo luego).</p>

            <div class="flex justify-center space-x-4">
                <button id="cancelDelete"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg">
                    Cancelar
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('exito'))
        <script>
            Swal.fire({
                icon: 'success',
                timer: 2500,
                title: "{{ session('exito') }}",
                showConfirmButton: true
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                timer: 2500,
                title: "{{ session('error') }}",
                showConfirmButton: true
            });
        </script>
    @endif


@endpush
