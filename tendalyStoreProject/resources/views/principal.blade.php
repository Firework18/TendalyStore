@extends('layouts.app')

@section('titulo', 'Bienvenido a Tendalystore')

@section('contenido')

    <section id="hero" class="relative w-full h-[600px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/fondo_evea-1024x682.jpg') }}" alt="Fondo Econegocios"
                class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-800/50 to-slate-900/90"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-8">
            <span
                class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-bold tracking-wider mb-6 uppercase">
                Plataforma de Negocios
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
                Catálogo de <br class="md:hidden" />
                <span class="text-red-500">Econegocios</span> y
                <span class="text-yellow-400">Bionegocios</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                Descubre productos sostenibles, conecta con emprendedores verdes y
                forma parte del ecosistema de economía circular más grande del Perú.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/catalogo"
                    class="w-full sm:w-auto px-8 py-4 bg-red-500 hover:bg-red-400 text-slate-900 font-bold rounded-full shadow-lg hover:shadow-yellow-500/20 transition-all transform hover:-translate-y-1">
                    Explorar Catálogo
                </a>
                @guest
                    <a href="{{ route('negocio.create') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-all">
                        Registrar mi tienda
                    </a>
                @endguest
                @auth
                    <a href="{{ route('dashboard.negocio') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-white text-slate-900 font-bold rounded-full shadow-lg hover:bg-gray-100 transition-all">
                        Gestionar mi Negocio
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <section id="catalog" class="relative bg-gray-50 py-20">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Negocios Destacados
                </h2>
                <div class="w-24 h-1.5 bg-red-500 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Explora productos que marcan la diferencia. Calidad, sostenibilidad e impacto positivo en un solo lugar.
                </p>
            </div>

            <x-listar-negocio :negocios="$negocios" />
        </div>
    </section>

    <section id="eco-business" class="relative py-24 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-40">
            <img src="{{ asset('assets/images/negociossec.jpeg') }}" class="w-full h-full object-cover" alt="Background">
        </div>
        <div class="absolute inset-0 z-0 bg-gradient-to-r from-red-900/90 to-slate-900/90 mix-blend-multiply"></div>

        <div class="relative z-10 container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">
                ¿Tienes un Econegocio?
            </h2>
            <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto leading-relaxed">
                Únete a la plataforma impulsada por Nexo IT y haz visible tu emprendimiento.
                Conecta hoy mismo con clientes responsables.
            </p>
            <div class="flex flex-col sm:flex-row gap-5 justify-center">
                <a href="{{ route('dashboard.negocio') }}">
                    <button
                        class="px-8 py-4 bg-red-600 hover:bg-red-500 text-white font-bold rounded-full shadow-lg shadow-red-900/20 transition-all transform hover:scale-105">
                        Registrar mi tienda ahora
                    </button>
                </a>

            </div>
        </div>
    </section>

    <section id="about" class="relative py-24 bg-white">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 space-y-8">
                    <div>
                        <span class="text-red-600 font-bold tracking-wider uppercase text-sm mb-2 block">
                            Nuestra Identidad
                        </span>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                            <a href="{{ route('nosotros') }}" class="hover:text-red-500 transition-colors"> Quiénes Somos
                            </a>
                        </h2>
                        <div class="w-20 h-1.5 bg-gradient-to-r from-red-600 to-red-400 rounded-full mt-6"></div>
                    </div>


                    <div class="bg-gray-50 p-6 rounded-2xl border-l-4 border-red-600">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
                            <i class="bi bi-cpu-fill text-red-600 mr-2"></i> El Soporte Tecnológico
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                            Esta plataforma es desarrollada y soportada por <strong>Nexo ITNegocios</strong>, empresa líder
                            con 21 años de experiencia en integración tecnológica en Latam. Aportamos la infraestructura,
                            seguridad y soporte técnico continuo para garantizar que los econegocios tengan un escaparate
                            digital robusto y moderno.
                        </p>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <li class="flex items-center text-gray-700">
                            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-xl"></i>
                            <span>Productos EcoAmigables</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="bi bi-check-circle-fill text-red-500 mr-3 text-xl"></i>
                            <span>Innovación Digital</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-xl"></i>
                            <span>Biodiversidad</span>
                        </li>

                    </ul>
                </div>

                <div class="order-1 lg:order-2 flex justify-center relative">
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-green-100 rounded-full blur-3xl opacity-60"></div>
                    <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-red-100 rounded-full blur-3xl opacity-60"></div>

                    <div class="relative z-10 w-full max-w-lg">
                        <img src="{{ asset('assets/images/about.jpg') }}" alt="Alianza Tecnológica y Ambiental"
                            class="rounded-3xl shadow-2xl object-cover w-full h-auto transform transition hover:scale-[1.02] duration-500 border-4 border-white" />

                        <div
                            class="absolute -bottom-8 -right-4 md:-right-8 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-4 max-w-[250px]">
                            <div class="bg-red-50 p-3 rounded-full text-red-600">
                                <i class="bi bi-laptop text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-semibold">Desarrollado por</p>
                                <p class="text-gray-900 font-bold">Nexo ITNegocios</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
