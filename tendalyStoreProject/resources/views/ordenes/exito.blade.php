@extends('layouts.app')
@section('titulo', 'Compra Finalizada - ' . $negocio->nombre)
@section('contenido')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden text-center p-8">

            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">¡Pedido Enviado!</h1>
            <p class="text-gray-500 mb-6">Hemos recibido tu comprobante de pago. El negocio validará la transferencia y
                preparará tu pedido.</p>

            <div class="bg-gray-50 rounded-xl p-4 mb-6 text-left border border-gray-100">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Código Orden:</span>
                    <span class="font-bold text-gray-900">{{ $orden->codigo }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Negocio:</span>
                    <span class="font-bold text-gray-900">{{ $orden->negocio->nombre }}</span>
                </div>
                <div class="flex justify-between border-t border-gray-200 pt-2 mt-2">
                    <span class="text-gray-800 font-semibold">Total Pagado:</span>
                    <span class="text-purple-600 font-bold">S/. {{ number_format($orden->total, 2) }}</span>
                </div>
            </div>

            <div class="space-y-3">
                <a href="{{ route('catalogo') }}"
                    class="block w-full bg-gray-900 text-white font-bold py-3 rounded-xl hover:bg-gray-800 transition shadow-lg">
                    Seguir Comprando
                </a>
                <!-- botón para ver "Mis Pedidos" en un futuro -->
            </div>
        </div>
    </div>
@endsection
