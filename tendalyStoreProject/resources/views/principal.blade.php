@extends('layouts.app')

@section('titulo', 'Bienvenido a Tendalystore')

@section('contenido')

    <section id="hero"
        class="relative w-full h-[500px] md:h-[600px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/fondo_evea-1024x682.jpg') }}" alt="Fondo Econegocios"
                class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-900/90"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4 md:px-8 flex flex-col items-center justify-center h-full">
            <span
                class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[10px] md:text-xs font-bold tracking-wider mb-4 md:mb-6 uppercase shadow-sm">
                Plataforma de Negocios
            </span>
            <h1
                class="text-3xl sm:text-4xl md:text-6xl font-extrabold text-white mb-4 md:mb-6 leading-tight drop-shadow-2xl">
                Catálogo de <br class="md:hidden" />
                <span class="text-red-500">Econegocios</span> y
                <span class="text-yellow-400">Bionegocios</span>
            </h1>

            <p
                class="text-base md:text-xl text-gray-200 mb-8 md:mb-10 max-w-xl md:max-w-2xl mx-auto font-light leading-relaxed hidden sm:block">
                Descubre productos sostenibles, conecta con emprendedores verdes y
                forma parte del ecosistema de economía circular más grande del Perú.
            </p>

            <p class="text-sm text-gray-200 mb-6 max-w-xs mx-auto font-light leading-relaxed sm:hidden">
                Descubre productos sostenibles y conecta con emprendedores verdes del Perú.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 md:gap-4 w-full sm:w-auto justify-center items-center">
                <a href="/catalogo"
                    class="w-full sm:w-auto px-6 py-3 md:px-8 md:py-4 bg-red-600 hover:bg-red-500 text-white font-bold rounded-full shadow-lg transition-all transform hover:-translate-y-1 text-center text-sm md:text-base">
                    Explorar Catálogo
                </a>
                @guest
                    <a href="{{ route('negocio.create') }}"
                        class="w-full sm:w-auto px-6 py-3 md:px-8 md:py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-all text-center text-sm md:text-base">
                        Registrar mi tienda
                    </a>
                @endguest
                @auth
                    <a href="{{ route('dashboard.negocio') }}"
                        class="w-full sm:w-auto px-6 py-3 md:px-8 md:py-4 bg-white text-slate-900 font-bold rounded-full shadow-lg hover:bg-gray-100 transition-all text-center text-sm md:text-base">
                        Gestionar mi Negocio
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <section id="catalog" class="relative bg-gray-50 py-16 md:py-24">
        <div class="container mx-auto px-4 md:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Negocios Destacados
                </h2>
                <div class="w-20 md:w-24 h-1.5 bg-red-500 mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-base md:text-lg px-2">
                    Explora productos que marcan la diferencia. Calidad, sostenibilidad e impacto positivo en un solo lugar.
                </p>
            </div>

            <x-listar-negocio :negocios="$negocios" />
        </div>
    </section>

    <section id="eco-business" class="relative py-20 md:py-24 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-40">
            <img src="{{ asset('assets/images/negociossec.jpeg') }}" class="w-full h-full object-cover" alt="Background">
        </div>
        <div class="absolute inset-0 z-0 bg-gradient-to-r from-gray-900/95 to-slate-900/95 mix-blend-multiply"></div>

        <div class="relative z-10 container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white leading-tight">
                ¿Tienes un Econegocio?
            </h2>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto leading-relaxed">
                Únete a la plataforma impulsada por Nexo IT y haz visible tu emprendimiento.
                Conecta hoy mismo con clientes responsables.
            </p>
            <div class="flex justify-center">
                <a href="{{ route('dashboard.negocio') }}" class="w-full sm:w-auto">
                    <button
                        class="w-full sm:w-auto px-8 py-4 bg-red-600 hover:bg-red-500 text-white font-bold rounded-full shadow-lg transition-all transform hover:scale-105">
                        Registrar mi tienda ahora
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section id="about" class="relative py-16 md:py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <div class="order-2 lg:order-1 space-y-6 md:space-y-8">
                    <div>
                        <span class="text-red-600 font-bold tracking-wider uppercase text-xs md:text-sm mb-2 block">
                            Nuestra Identidad
                        </span>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                            <a href="{{ route('nosotros') }}" class="hover:text-red-600 transition-colors">
                                Quiénes Somos
                            </a>
                        </h2>
                        <div class="w-20 h-1.5 bg-gradient-to-r from-red-600 to-red-400 rounded-full mt-4 md:mt-6"></div>
                    </div>


                    <div class="bg-gray-50 p-5 md:p-6 rounded-2xl border-l-4 border-red-600 shadow-sm">
                        <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2 flex items-center">
                            <i class="bi bi-cpu-fill text-red-600 mr-2"></i> El Soporte Tecnológico
                        </h3>
                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                            Esta plataforma es desarrollada y soportada por <strong>Nexo ITNegocios</strong>, empresa líder
                            con 21 años de experiencia en integración tecnológica en Latam. Aportamos la infraestructura,
                            seguridad y soporte técnico continuo para garantizar un escaparate digital robusto.
                        </p>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 pt-2">
                        <li class="flex items-center text-gray-700 font-medium">
                            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-lg md:text-xl"></i>
                            <span>Productos EcoAmigables</span>
                        </li>
                        <li class="flex items-center text-gray-700 font-medium">
                            <i class="bi bi-check-circle-fill text-red-500 mr-3 text-lg md:text-xl"></i>
                            <span>Innovación Digital</span>
                        </li>
                        <li class="flex items-center text-gray-700 font-medium">
                            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-lg md:text-xl"></i>
                            <span>Biodiversidad</span>
                        </li>
                    </ul>
                </div>

                <div class="order-1 lg:order-2 flex justify-center relative mt-8 lg:mt-0">
                    <div
                        class="absolute -top-10 -right-10 w-40 md:w-64 h-40 md:h-64 bg-green-100 rounded-full blur-3xl opacity-60">
                    </div>
                    <div
                        class="absolute -bottom-10 -left-10 w-40 md:w-64 h-40 md:h-64 bg-red-100 rounded-full blur-3xl opacity-60">
                    </div>

                    <div class="relative z-10 w-full max-w-md lg:max-w-lg">
                        <img src="{{ asset('assets/images/about.jpg') }}" alt="Alianza Tecnológica y Ambiental"
                            class="rounded-3xl shadow-2xl object-cover w-full h-auto transform transition border-4 border-white relative z-10" />

                        <div
                            class="absolute -bottom-6 left-1/2 -translate-x-1/2 md:translate-x-0 md:left-auto md:-right-8 bg-white p-3 md:p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3 md:gap-4 w-[90%] md:w-auto max-w-[260px] z-20">
                            <div class="bg-red-50 p-2 md:p-3 rounded-full text-red-600 flex-shrink-0">
                                <i class="bi bi-laptop text-xl md:text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-[10px] md:text-xs text-gray-500 uppercase font-semibold whitespace-nowrap">
                                    Desarrollado por</p>
                                <p class="text-gray-900 font-bold text-sm md:text-base leading-tight">Nexo ITNegocios</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
