@extends('layouts.app')

@section('titulo')
    Inicia Sesión - TendalyStore
@endsection

@section('contenido')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">

            <div class="hidden md:block md:w-1/2 bg-red-50 relative">
                <img src="{{ asset('assets/images/login.png') }}" alt="Imagen de registro de usuarios"
                    class="w-full h-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-t from-red-900/40 to-transparent"></div>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Bienvenido a <span class="text-red-600">TendalyStore</span>
                    </h2>
                    <p class="text-gray-500 text-sm mt-2">Ingresa tus credenciales para acceder</p>
                </div>

                <form action="{{ route('login') }}" method="POST" novalidate>
                    @csrf

                    @if (session('mensaje'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 text-sm rounded"
                            role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ session('mensaje') }}</p>
                        </div>
                    @endif

                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" placeholder="nombre@correo.com"
                                class="pl-10 w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 border p-3 transition duration-200 ease-in-out @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="pl-10 w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 border p-3 transition duration-200 ease-in-out @error('password') border-red-500 @enderror">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs italic mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded cursor-pointer">
                            <label for="remember" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                                Recordar sesión
                            </label>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transform transition hover:-translate-y-0.5 duration-200">
                        INICIAR SESIÓN
                    </button>

                    <div class="mt-8 text-center">
                        <p class="text-sm text-gray-600">
                            ¿No tienes una cuenta?
                            <a href="{{ route('register') }}"
                                class="font-medium text-red-600 hover:text-red-500 transition-colors duration-200 underline hover:no-underline">
                                Regístrate gratis
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
