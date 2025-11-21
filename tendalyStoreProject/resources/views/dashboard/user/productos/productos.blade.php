@extends('dashboard.user.app')

@section('titulo', 'Gestión de Productos')
@section('titulo_contenido', 'Administración de Productos')
@section('primera_descripcion', 'Aquí puedes ver, editar y añadir tus productos.')

@section('contenido')
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">

        <livewire:mostrar-productos :negocio="$negocio" />

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
