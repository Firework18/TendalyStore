@extends('layouts.app')
@section('titulo', 'Mi Perfil')

@section('contenido')
<main class="min-h-screen pt-24 pb-12 bg-[var(--color-background)]">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">

        <!-- Banner de Perfil -->
        <div class="relative h-56 bg-gradient-to-r from-[#1E3A8A] to-[#3B82F6] rounded-t-xl">
            <!-- Banner de color azul, puedes cambiarlo si tienes una variable específica -->
        </div>

        <!-- Contenido principal del perfil -->
        <div class="relative -mt-24 px-6 md:px-12 pb-8">
            <!-- Sección Superior: Imagen, Nombre, Botón Editar, Estado -->
            <div class="flex flex-col md:flex-row items-center md:items-start justify-between">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6 w-full">
                    <!-- Imagen de Perfil -->
                    <div class="w-40 h-40 rounded-full overflow-hidden border-6 border-white shadow-xl z-10 bg-gray-200 flex-shrink-0">
                        <img src="{{ asset('assets/images/default-profile.png') }}" alt="Foto de Perfil de Usuario" class="w-full h-full object-cover">
                    </div>

                    <!-- Nombre y Datos Básicos -->
                    <div class="text-center md:text-left mt-4 md:mt-0">
                        <p class="text-white text-sm">{{auth()->user()->username}}</p>
                        <h1 class="text-4xl font-extrabold text-[var(--color-text)] mt-1 mb-2">{{auth()->user()->name}} {{auth()->user()->apellido_paterno}}</h1>
                        <div class="flex items-center justify-center md:justify-start space-x-3 text-sm text-gray-600">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-800 font-semibold">
                                <i class="bi bi-check-circle-fill mr-1"></i> Vendedor Verificado
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-800 font-semibold">
                                <i class="bi bi-calendar-event mr-1"></i> Miembro desde 2024
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Botón Editar Perfil -->
                <a href="#" class="mt-6 md:mt-0 px-6 py-2 border-2 border-[var(--color-primary)] text-[var(--color-primary)] font-bold rounded-full hover:bg-red-50 transition-all duration-200 flex items-center shadow-md">
                    <i class="bi bi-pencil-square mr-2"></i> Editar Perfil
                </a>
            </div>

            <!-- Métricas de Perfil -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 bg-white p-6 mt-8 rounded-lg shadow-inner border border-gray-100">
                <div class="text-center">
                    <p class="text-4xl font-bold text-[var(--color-primary)]">2</p>
                    <p class="text-gray-600 text-sm">Negocios</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-[var(--color-primary)]">42</p>
                    <p class="text-gray-600 text-sm">Productos</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-[var(--color-primary)]">245</p>
                    <p class="text-gray-600 text-sm">Ventas</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold text-[var(--color-accent)] flex items-center justify-center">
                        4.7 <i class="bi bi-star-fill ml-2 text-3xl"></i>
                    </p>
                    <p class="text-gray-600 text-sm">Valoración</p>
                </div>
            </div>

            <!-- Navegación por Pestañas -->
            <div class="border-b border-gray-200 mt-10">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-[var(--color-primary)] text-[var(--color-primary)] active" data-tab="personal">
                        <i class="bi bi-person-circle mr-2"></i> Información Personal
                    </button>
                    <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="negocios">
                        <i class="bi bi-shop mr-2"></i> Mis Negocios
                    </button>
                    <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="pedidos">
                        <i class="bi bi-box-seam mr-2"></i> Mis Pedidos
                    </button>
                    <button class="tab-button whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="configuracion">
                        <i class="bi bi-gear-fill mr-2"></i> Configuración
                    </button>
                </nav>
            </div>

            <!-- Contenido de las Pestañas -->
            <div class="mt-8">
                <!-- Información Personal (Pestaña por defecto) -->
                <div id="tab-personal" class="tab-content">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-5 flex items-center">
                        <i class="bi bi-person-badge-fill text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Actualiza tu información personal y de contacto
                    </h2>

                    <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 mb-8">
                        <h3 class="text-xl font-semibold text-[var(--color-text)] mb-3">Biografía</h3>
                        <p class="text-gray-700 leading-relaxed italic">
                            Emprendedor sostenible apasionado por los productos ecológicos y el comercio justo.
                        </p>
                        <!-- Aquí podrías añadir un botón de editar biografía si es necesario -->
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Nombre</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">Nombre del Usuario</p>
                        </div>
                        <!-- Apellido -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Apellido</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">Apellido del Usuario</p>
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">usuario@email.com</p>
                        </div>
                        <!-- Teléfono -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">+51 987 654 321</p>
                        </div>
                        <!-- Dirección -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500">Dirección</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">Av. Javier Prado 123, San Juan de Lurigancho</p>
                        </div>
                        <!-- Ciudad -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Ciudad</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">Lima</p>
                        </div>
                        <!-- País (ejemplo adicional) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500">País</label>
                            <p class="mt-1 text-lg text-[var(--color-text)] p-3 bg-gray-50 rounded-lg border border-gray-200">Perú</p>
                        </div>
                    </div>
                </div>

                <!-- Mis Negocios (Contenido de ejemplo) -->
                <div id="tab-negocios" class="tab-content hidden">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-5 flex items-center">
                        <i class="bi bi-shop text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Mis Negocios Registrados
                    </h2>
                    @if (auth()->user()->tiene_negocio)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tarjeta de Negocio 1 -->
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4">
                            <img src="{{ asset('assets/images/frutas.jpg') }}" alt="Negocio EcoFresh" class="w-16 h-16 object-cover rounded-full flex-shrink-0">
                            <div>
                                <h3 class="text-xl font-bold text-[var(--color-primary)]">EcoFresh Orgánicos</h3>
                                <p class="text-gray-700 text-sm">Alimentos frescos y cultivados sin químicos.</p>
                                <a href="#" class="text-[var(--color-secondary)] hover:text-[var(--color-primary)] text-sm font-semibold mt-1 inline-block">Ver detalles <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- Tarjeta de Negocio 2 -->
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex items-center space-x-4">
                            <img src="{{ asset('assets/images/moda.jpg') }}" alt="Negocio Moda Sostenible" class="w-16 h-16 object-cover rounded-full flex-shrink-0">
                            <div>
                                <h3 class="text-xl font-bold text-[var(--color-primary)]">Moda Sostenible</h3>
                                <p class="text-gray-700 text-sm">Ropa ecológica con fibras naturales.</p>
                                <a href="#" class="text-[var(--color-secondary)] hover:text-[var(--color-primary)] text-sm font-semibold mt-1 inline-block">Ver detalles <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @else
                       No tiene un negocio asociado 
                    @endif
                    
                    <div class="mt-8 text-center">
                        <a href={{route('post.create')}} class="px-6 py-3 bg-[var(--color-accent)] hover:bg-[#e09f0c] text-[var(--color-text)] font-bold rounded-full shadow-md transition-colors duration-300">
                            Registrar Nuevo Negocio <i class="bi bi-plus-circle ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Mis Pedidos (Contenido de ejemplo) -->
                <div id="tab-pedidos" class="tab-content hidden">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-5 flex items-center">
                        <i class="bi bi-box-seam text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Historial de Pedidos
                    </h2>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="font-bold text-lg text-[var(--color-text)]">Pedido #12345</h3>
                                <span class="bg-green-200 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Entregado</span>
                            </div>
                            <p class="text-gray-600">Fecha: 15/05/2024</p>
                            <p class="text-gray-600">Total: S/ 120.00</p>
                            <a href="#" class="text-[var(--color-secondary)] hover:text-[var(--color-primary)] text-sm font-semibold mt-2 inline-block">Ver detalles del pedido <i class="bi bi-arrow-right"></i></a>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="font-bold text-lg text-[var(--color-text)]">Pedido #12346</h3>
                                <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Pendiente</span>
                            </div>
                            <p class="text-gray-600">Fecha: 20/05/2024</p>
                            <p class="text-gray-600">Total: S/ 85.00</p>
                            <a href="#" class="text-[var(--color-secondary)] hover:text-[var(--color-primary)] text-sm font-semibold mt-2 inline-block">Ver detalles del pedido <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Configuración (Contenido de ejemplo) -->
                <div id="tab-configuracion" class="tab-content hidden">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-5 flex items-center">
                        <i class="bi bi-gear-fill text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Ajustes de la Cuenta
                    </h2>
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100">
                            <h3 class="font-bold text-xl text-[var(--color-text)] mb-3">Cambiar Contraseña</h3>
                            <form action="#" method="POST" class="space-y-4">
                                <input type="password" placeholder="Contraseña actual" class="p-3 w-full border rounded-lg focus:ring-2 focus:ring-[var(--color-secondary)]">
                                <input type="password" placeholder="Nueva contraseña" class="p-3 w-full border rounded-lg focus:ring-2 focus:ring-[var(--color-secondary)]">
                                <input type="password" placeholder="Confirmar nueva contraseña" class="p-3 w-full border rounded-lg focus:ring-2 focus:ring-[var(--color-secondary)]">
                                <button type="submit" class="px-6 py-3 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white font-bold rounded-lg shadow-md transition-colors duration-300">
                                    Actualizar Contraseña
                                </button>
                            </form>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100">
                            <h3 class="font-bold text-xl text-[var(--color-text)] mb-3">Eliminar Cuenta</h3>
                            <p class="text-gray-700 mb-4">Ten cuidado, esta acción es irreversible.</p>
                            <button class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg shadow-md transition-colors duration-300">
                                Eliminar Mi Cuenta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Desactivar todos los botones
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-[var(--color-primary)]', 'text-[var(--color-primary)]', 'active');
                    btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                });

                // Ocultar todos los contenidos
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Activar el botón clicado
                button.classList.add('border-[var(--color-primary)]', 'text-[var(--color-primary)]', 'active');
                button.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');

                // Mostrar el contenido correspondiente
                const targetTab = button.dataset.tab;
                document.getElementById(`tab-${targetTab}`).classList.remove('hidden');
            });
        });

        // Asegurarse de que el primer tab esté activo por defecto al cargar la página
        if (tabButtons.length > 0) {
            tabButtons[0].click();
        }
    });
</script>
@endsection
</body>
</html>