@extends('dashboard.user.app')

@section('titulo', 'Mi Perfil')
@section('titulo_contenido', 'Mi Perfil')
@section('primera_descripcion', 'Administra la información de tu cuenta.')

@section('contenido')


    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">

        <div class="h-32 bg-gradient-to-r from-red-600 to-red-800"></div>

        <div class="px-8 pb-8">

            @livewire('banner-perfil', ['user' => $user])

            <hr class="border-gray-100 mb-8">

            @livewire('editar-perfil', ['user' => $user])

        </div>
    </div>




    <div class="mt-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-8 px-2">Gestionar Cuenta</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


            <!-- Card 3 -->
            <a href="{{ route('direcciones.index') }}"
                class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all duration-300">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 bg-red-50 text-red-600 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                        <i class="bi bi-geo-alt text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-red-600 transition-colors">Direcciones
                    </h4>
                </div>
                <p class="text-gray-500 text-sm mb-4 line-clamp-2">Administra tus direcciones de envío para un proceso
                    de compra más rápido.</p>
                <span
                    class="text-red-600 font-medium text-sm flex items-center group-hover:translate-x-2 transition-transform">
                    Gestionar direcciones <span class="ml-2">&rarr;</span>
                </span>
            </a>


            <!-- Card 5 -->
            <a href="#"
                class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all duration-300">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 bg-red-50 text-red-600 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                        <i class="bi bi-shield-lock text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-red-600 transition-colors">Privacidad
                    </h4>
                </div>
                <p class="text-gray-500 text-sm mb-4 line-clamp-2">Revisa y ajusta tus configuraciones de privacidad y
                    datos personales.</p>
                <span
                    class="text-red-600 font-medium text-sm flex items-center group-hover:translate-x-2 transition-transform">
                    Configurar privacidad <span class="ml-2">&rarr;</span>
                </span>
            </a>

            <!-- Card 6 -->
            <a href="#"
                class="group relative bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-red-200 transition-all duration-300">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="p-3 bg-red-50 text-red-600 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                        <i class="bi bi-file-earmark-text text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-red-600 transition-colors">Mis Pedidos
                    </h4>
                </div>
                <p class="text-gray-500 text-sm mb-4 line-clamp-2">Consulta el estado, historial y detalles de tus
                    compras anteriores.</p>
                <span
                    class="text-red-600 font-medium text-sm flex items-center group-hover:translate-x-2 transition-transform">
                    Ver historial <span class="ml-2">&rarr;</span>
                </span>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Nota: He cambiado el ID del input en el HTML a 'profileImageUpload' 
            // para que coincida con este script
            const profileImageUpload = document.getElementById('profileImageUpload');
            const profileImagePreview = document.getElementById('profileImagePreview');

            if (profileImageUpload && profileImagePreview) {
                profileImageUpload.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            profileImagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endpush
