@extends('layouts.app')

@section('titulo')
    Regístrate - TendalyStore
@endsection

@section('contenido')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">

            <div class="hidden md:block md:w-5/12 bg-red-50 relative">
                <img src="{{ asset('assets/images/register.png') }}" alt="Imagen de registro"
                    class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-t from-red-900/50 to-transparent"></div>

                <div class="absolute bottom-10 left-10 text-white z-10">
                    <h3 class="text-3xl font-bold">Únete hoy</h3>
                    <p class="text-red-100 mt-2">Descubre las mejores ofertas.</p>
                </div>
            </div>

            <div class="w-full md:w-7/12 p-8 md:p-10">
                <div class="text-center mb-6">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Crea tu cuenta en <span class="text-red-600">TendalyStore</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-2">Completa tus datos para comenzar</p>
                </div>

                <form action="{{ route('register') }}" method="POST" novalidate>
                    @csrf
                    <div class="md:grid md:grid-cols-2 md:gap-4">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre
                                Completo</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" id="name" name="name" placeholder="Juan Pérez"
                                    value="{{ old('name') }}"
                                    class="pl-10 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 p-2.5 transition @error('name') border-red-500 @enderror">
                            </div>
                            @error('name')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Nombre de
                                Usuario</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                </div>
                                <input type="text" id="username" name="username" placeholder="juanperez99"
                                    value="{{ old('username') }}"
                                    class="pl-10 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 p-2.5 transition @error('username') border-red-500 @enderror">
                            </div>
                            @error('username')
                                @livewire('mostrar-alerta', ['message' => $message])
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo
                            Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" placeholder="tu@correo.com"
                                value="{{ old('email') }}"
                                class="pl-10 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 p-2.5 transition @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                            @livewire('mostrar-alerta', ['message' => $message])
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres"
                                class="pl-10 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 p-2.5 transition @error('password') border-red-500 @enderror">
                        </div>
                        @error('password')
                            @livewire('mostrar-alerta', ['message' => $message])
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmar
                            Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Repite tu contraseña"
                                class="pl-10 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 p-2.5 transition">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transform transition hover:-translate-y-0.5 duration-200">
                        CREAR CUENTA
                    </button>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            ¿Ya tienes una cuenta?
                            <a href="{{ route('login') }}"
                                class="font-medium text-red-600 hover:text-red-500 transition-colors duration-200 underline hover:no-underline">
                                Inicia sesión aquí
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
