@extends('layouts.app')

@section('titulo')
    Perfil de {{ $user->username }}
@endsection

@section('contenido')
    <div class="min-h-screen bg-gray-50 pb-12">
        <div class="relative h-64 bg-gradient-to-r from-red-600 to-black overflow-hidden">
            <div class="absolute inset-0 bg-white/10 opacity-20"
                style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <div class="lg:col-span-4 xl:col-span-3 space-y-6">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 text-center p-6">
                        <div class="relative inline-block">
                            <div
                                class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white shadow-md bg-gray-200">
                                <img src="{{ $user->imagen ? asset('/storage/perfiles/' . $user->imagen) : asset('assets/images/default-profile.png') }}"
                                    alt="{{ $user->username }}" class="w-full h-full object-cover">
                            </div>
                            <span class="absolute bottom-2 right-2 w-5 h-5 bg-green-500 border-4 border-white rounded-full"
                                title="Usuario Activo"></span>
                        </div>

                        <h1 class="mt-4 text-xl font-bold text-gray-900">{{ $user->name }} {{ $user->apellido_paterno }}
                        </h1>
                        <p class="text-sm text-gray-500 font-medium">@ {{ $user->username }}</p>

                        <div class="mt-6 flex justify-center space-x-4">
                            <button
                                class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 transition">
                                Contactar
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-gray-900 font-bold text-lg mb-4 border-b border-gray-100 pb-2">Detalles</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start">
                                <i class="bi bi-envelope text-red-500 text-lg mt-0.5 mr-3"></i>
                                <div>
                                    <span class="block text-gray-500 text-xs">Email</span>
                                    <span
                                        class="text-gray-700 font-medium break-all">{{ $user->email ?? 'usuario@email.com' }}</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-telephone text-red-500 text-lg mt-0.5 mr-3"></i>
                                <div>
                                    <span class="block text-gray-500 text-xs">Teléfono</span>
                                    <span
                                        class="text-gray-700 font-medium">{{ $user->telefono ?? 'No especificado' }}</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-geo-alt text-red-500 text-lg mt-0.5 mr-3"></i>
                                <div>
                                    <span class="block text-gray-500 text-xs">Ubicación</span>
                                    <span class="text-gray-700 font-medium">{{ $user->direccion ?? 'Lima, Perú' }}</span>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="bi bi-calendar3 text-red-500 text-lg mt-0.5 mr-3"></i>
                                <div>
                                    <span class="block text-gray-500 text-xs">Miembro desde</span>
                                    <span
                                        class="text-gray-700 font-medium">{{ $user->created_at->locale('es')->isoFormat('MMM YYYY') }}</span>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <p class="text-xs text-gray-400 uppercase font-semibold mb-3 tracking-wider">Social</p>
                            <div class="flex justify-start gap-4">
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-all">
                                    <i class="bi bi-facebook text-xl"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-500 hover:bg-pink-50 hover:text-pink-600 transition-all">
                                    <i class="bi bi-instagram text-xl"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-500 hover:bg-gray-200 hover:text-black transition-all">
                                    <i class="bi bi-twitter-x text-xl"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 text-gray-500 hover:bg-blue-50 hover:text-blue-700 transition-all">
                                    <i class="bi bi-linkedin text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 xl:col-span-9 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
                        <div class="flex items-center mb-6">
                            <div class="p-2 bg-red-50 rounded-lg text-red-600 mr-3">
                                <i class="bi bi-person-lines-fill text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Acerca de Mí</h2>
                        </div>

                        <div class="prose prose-red max-w-none text-gray-600 leading-relaxed">
                            @if ($user->informacion)
                                {!! nl2br(e($user->informacion)) !!}
                            @else
                                <div
                                    class="flex flex-col items-center justify-center py-8 text-gray-400 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                    <i class="bi bi-text-paragraph text-4xl mb-2 opacity-50"></i>
                                    <p>Este usuario aún no ha agregado una biografía.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
                        <div class="flex items-center mb-6">
                            <div class="p-2 bg-red-50 rounded-lg text-red-600 mr-3">
                                <i class="bi bi-briefcase-fill text-2xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-800">Negocio Asociado</h2>
                        </div>

                        @if ($negocio)
                            <div
                                class="group relative bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md hover:border-red-300 transition-all duration-300">
                                <div class="md:flex">
                                    <div
                                        class="md:shrink-0 bg-gray-100 w-full md:w-48 h-48 md:h-auto flex items-center justify-center text-gray-300">
                                        <img src="{{ asset('/storage/negocios/' . $negocio->imagen) }}" alt="">
                                    </div>
                                    <div class="p-6 flex flex-col justify-between w-full">
                                        <div>
                                            <div class="uppercase tracking-wide text-sm text-red-600 font-semibold">
                                                Empresa</div>
                                            <h3
                                                class="mt-1 text-xl font-bold text-gray-900 group-hover:text-red-600 transition-colors">
                                                {{ $negocio->nombre }}
                                            </h3>
                                            <p class="mt-2 text-gray-500 line-clamp-2">
                                                {{ $negocio->descripcion }}
                                            </p>
                                        </div>
                                        <div class="mt-4">
                                            <a href="{{ route('negocio.show', $negocio) }}"
                                                class="inline-flex items-center text-red-600 font-semibold hover:text-red-800 transition-colors">
                                                Ver perfil del negocio
                                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div
                                class="flex flex-col items-center justify-center py-10 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200 text-center">
                                <div class="bg-white p-4 rounded-full shadow-sm mb-3">
                                    <i class="bi bi-shop-window text-3xl text-gray-300"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">Sin negocio asociado</h3>
                                <p class="text-gray-500 max-w-sm mt-1">Actualmente este usuario no tiene ningún negocio
                                    vinculado a su perfil público.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
