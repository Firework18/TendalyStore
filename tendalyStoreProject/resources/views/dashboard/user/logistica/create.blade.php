@extends('dashboard.user.app')

@section('titulo', 'Configuración de Ventas')
@section('titulo_contenido', 'Logística y Pagos')
@section('primera_descripcion',
    'Configura tus opciones de delivery, costos de envío y cuenta de Yape para recibir
    pagos.')

@section('contenido')

    <livewire:configuracion-logistica />

@endsection

@push('scripts')
    <script>
        // Script simple para previsualizar la imagen del QR antes de subir
        document.getElementById('qr_yape').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('qr-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Script opcional para deshabilitar costo si el delivery está inactivo
        const toggleDelivery = document.getElementById('delivery_activo');
        const inputCosto = document.getElementById('costo_envio');

        function checkDeliveryStatus() {
            if (!toggleDelivery.checked) {
                inputCosto.classList.add('bg-gray-100', 'text-gray-400');
                inputCosto.disabled = true;
            } else {
                inputCosto.classList.remove('bg-gray-100', 'text-gray-400');
                inputCosto.disabled = false;
            }
        }

        // Ejecutar al cargar y al cambiar
        toggleDelivery.addEventListener('change', checkDeliveryStatus);
        // Ejecutar una vez al inicio por si viene desactivado del backend
        checkDeliveryStatus();
    </script>
@endpush
