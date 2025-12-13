@extends('dashboard.user.app')

@section('titulo', 'Gestión de Productos')
@section('titulo_contenido', 'Inventario')
@section('primera_descripcion', 'Aquí puedes ver, editar y añadir tus productos.')

@section('contenido')

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">

        <div
            class="px-6 py-5 border-b border-gray-200 bg-white flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="w-full md:w-96">
                <livewire:filtrar-productos />
            </div>

            <a href="{{ route('producto.create') }}"
                class="w-full md:w-auto inline-flex items-center justify-center px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-xl transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Nuevo Producto
            </a>

        </div>

        <div class="flex-1">
            <livewire:mostrar-productos :negocio="$negocio" />
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
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                timer: 2500,
                title: "{{ session('error') }}",
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        </script>
    @endif
@endpush
