@extends('dashboard.user.app')

@section('titulo', 'Mis Pedidos')
@section('titulo_contenido', 'Historial de Compras')
@section('primera_descripcion', 'Administra tus pedidos, consulta detalles y descarga tus comprobantes.')

@section('contenido')
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden flex flex-col">

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
                <livewire:orden-cliente />
            </div>

        </div>

    </div>
@endsection
