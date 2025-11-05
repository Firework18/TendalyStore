@extends('dashboard.user.app')

@section('titulo', 'Mi Perfil')
@section('titulo_contenido', 'Mi Perfil')
@section('primera_descripcion', 'Administra la información de tu cuenta.')

@section('contenido')
<div class="container mx-auto ">
    <div class="bg-white shadow rounded-lg p-6 lg:p-8">
        <div class="flex flex-col lg:flex-row items-center lg:items-start gap-6 lg:gap-8">
            <!-- Sección de Imagen de Perfil -->
            <div class="flex-shrink-0">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-red-500 shadow-md">
                    <img src="{{ asset('assets/images/default-profile.png') }}" alt="Imagen de Perfil" class="w-full h-full object-cover" id="profileImagePreview">
                </div>
                <div class="mt-4 text-center">
                    <input type="file" id="profileImageUpload" class="hidden" accept="image/*">
                    <label for="profileImageUpload" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
                        Cambiar Imagen
                    </label>
                </div>
            </div>

            <!-- Sección de Información del Usuario -->
            <div class="flex-grow w-full">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center lg:text-left">Información Personal</h3>

                <form action="#actualizarPerfil" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre de Usuario -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                            <input type="text" name="username" id="username" value="{{ old('username', auth()->user()->username) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" required>
                            @error('username')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido Paterno -->
                        <div>
                            <label for="paternal_surname" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                            <input type="text" name="paternal_surname" id="paternal_surname" value="{{ old('paternal_surname', auth()->user()->paternal_surname) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            @error('paternal_surname')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido Materno -->
                        <div>
                            <label for="maternal_surname" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                            <input type="text" name="maternal_surname" id="maternal_surname" value="{{ old('maternal_surname', auth()->user()->maternal_surname) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            @error('maternal_surname')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ old('address', auth()->user()->address) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Información Adicional -->
                        <div class="md:col-span-2">
                            <label for="info" class="block text-sm font-medium text-gray-700">Información Adicional</label>
                            <textarea name="info" id="info" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ old('info', auth()->user()->info) }}</textarea>
                            @error('info')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Creación -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Miembro desde</label>
                            <p class="mt-1 text-gray-900">{{ auth()->user()->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <a href="{{route('post.index',$user->username)}}" class="content-center mr-2 text-red-500 font-semibold">Visitar Muro</a>
                        <button type="submit" class="px-6 py-3 bg-red-600 text-white font-semibold rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Guardar Cambios
                        </button> 
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-10 border-gray-200">

        <!-- Sección de Funcionalidades Adicionales (Dashboard de Usuario) -->
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center lg:text-left">Funcionalidades del Dashboard</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-key text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Cambiar Contraseña</h4>
                <p class="text-gray-600 text-sm mb-4">Actualiza tu contraseña para mantener tu cuenta segura.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Ir a cambiar contraseña &rarr;</a>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-wallet text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Métodos de Pago</h4>
                <p class="text-gray-600 text-sm mb-4">Gestiona tus tarjetas y otros métodos de pago.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Ver métodos de pago &rarr;</a>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-geo-alt text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Direcciones de Envío</h4>
                <p class="text-gray-600 text-sm mb-4">Administra tus direcciones para un checkout rápido.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Gestionar direcciones &rarr;</a>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-bell text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Preferencias de Notificación</h4>
                <p class="text-gray-600 text-sm mb-4">Configura cómo deseas recibir notificaciones.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Ajustar notificaciones &rarr;</a>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-shield-lock text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Privacidad y Seguridad</h4>
                <p class="text-gray-600 text-sm mb-4">Revisa y ajusta tus configuraciones de privacidad.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Configurar privacidad &rarr;</a>
            </div>

            <div class="bg-red-50 border border-red-200 rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
                <i class="bi bi-file-earmark-text text-red-600 text-3xl mb-3 block"></i>
                <h4 class="font-semibold text-lg text-gray-800 mb-2">Historial de Pedidos</h4>
                <p class="text-gray-600 text-sm mb-4">Consulta el estado y detalles de tus pedidos anteriores.</p>
                <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Ver historial de pedidos &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Script para previsualizar la imagen de perfil
    document.addEventListener('DOMContentLoaded', function() {
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