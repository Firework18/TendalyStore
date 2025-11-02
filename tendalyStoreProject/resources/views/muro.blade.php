@extends('layouts.app')
@section('titulo')
Perfil de {{$user->username}}
@endsection

@section('contenido')
<main class="min-h-screen pt-2 pb-12 bg-[var(--color-background)] flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-4xl ">

        <!-- Banner de Perfil (Opcional, para un toque más profesional) -->
        <div class="relative h-48 bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)] rounded-t-lg mb-16">
            <!-- La imagen de perfil se superpondrá a este banner -->
        </div>

        <!-- Contenedor principal del perfil -->
        <div class="relative -mt-32 flex flex-col items-center">
            <!-- Imagen de Perfil -->
            <div class="w-40 h-40 rounded-full overflow-hidden border-6 border-white shadow-lg z-10 bg-gray-200">
                <img src="{{ asset('assets/images/default-profile.png') }}" alt="Foto de Perfil de Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Nombre del Usuario -->
            
            <h1 class="text-4xl font-extrabold text-[var(--color-text)] mt-4 mb-2 text-center">{{$user->name}} {{$user->apellido_paterno}}</h1>
            <p class="text-lg text-gray-500 mb-6 text-center"></p>

            <!-- Separador elegante -->
            <div class="w-24 h-1 bg-[var(--color-accent)] rounded-full mb-8"></div>

            <!-- Información Relevante -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 w-full max-w-2xl px-4">

                <!-- Sección "Acerca de Mí" -->
                <div class="col-span-full mb-6">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-3 flex items-center">
                        <i class="bi bi-person-circle text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Acerca de Mí
                    </h2>

                    @if ($user->informacion)
                        <p class="text-gray-700 leading-relaxed">
                        {{$user->informacion}}
                        </p>
                    @else
                    <p class="text-gray-700 leading-relaxed font-bold">
                        No presenta información...    
                    </p>
                    @endif
                </div>

                <!-- Contacto e Información Personal -->
                <div>
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-3 flex items-center">
                        <i class="bi bi-info-circle-fill text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Información
                    </h2>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center">
                            <i class="bi bi-envelope-fill text-lg mr-3 text-[var(--color-accent)]"></i>
                            <span class="font-medium">Correo:</span> usuario@email.com
                        </li>
                        <li class="flex items-center">
                            <i class="bi bi-telephone-fill text-lg mr-3 text-[var(--color-accent)]"></i>
                            <span class="font-medium">Teléfono:</span> +51 987 654 321
                        </li>
                        <li class="flex items-center">
                            <i class="bi bi-geo-alt-fill text-lg mr-3 text-[var(--color-accent)]"></i>
                            <span class="font-medium">Ubicación:</span> Lima, Perú
                        </li>
                        <li class="flex items-center">
                            <i class="bi bi-calendar-event-fill text-lg mr-3 text-[var(--color-accent)]"></i>
                            <span class="font-medium">Miembro desde:</span> Enero 2022
                        </li>
                    </ul>
                </div>

                <!-- Negocio Asociado -->
                <div>
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-3 flex items-center">
                        <i class="bi bi-shop text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Negocio Asociado
                    </h2>

                    @if ($user->negocios)
                        
                    <div class="bg-[var(--color-background)] p-4 rounded-lg shadow-sm border border-gray-200">
                        <h3 class="text-xl font-bold text-[var(--color-primary)] mb-2">{{$user->negocios->nombre}}</h3>
                        <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                            {{$user->negocios->descripcion}}
                        </p>
                        <a href={{route('negocio.index',$user->negocios)}} class="inline-flex items-center text-[var(--color-secondary)] hover:text-[var(--color-primary)] font-semibold transition-colors duration-200">
                            Ver Negocio <i class="bi bi-arrow-right ml-2"></i>
                        </a>
                    </div>

                    @else

                    No presenta negocio..

                    @endif

                    
                </div>

                <!-- Redes Sociales -->
                <div class="col-span-full mt-6">
                    <h2 class="text-2xl font-bold text-[var(--color-primary)] mb-3 flex items-center">
                        <i class="bi bi-share-fill text-3xl mr-3 text-[var(--color-secondary)]"></i>
                        Redes Sociales
                    </h2>
                    <div class="flex space-x-6 text-3xl">
                        <a href="#" class="text-blue-600 hover:text-blue-800 transition"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-pink-600 hover:text-pink-800 transition"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-600 transition"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-blue-700 hover:text-blue-900 transition"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
            
            

        </div>
    </div>
</main>
@endsection
</body>
</html>