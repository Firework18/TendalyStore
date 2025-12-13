@extends('layouts.app')
@section('titulo', 'Sobre Nosotros')

@section('contenido')
    <main class="bg-gray-50 min-h-screen">

        <section class="relative h-[500px] md:h-[600px] flex items-center justify-center text-center overflow-hidden">
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop"
                    alt="Equipo Nexo IT" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 via-gray-900/80 to-gray-900/90"></div>
            </div>
            <div class="relative z-10 max-w-4xl mx-auto px-4 flex flex-col items-center">
                <div
                    class="mb-8 bg-white p-4 rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-300 inline-block">
                    <a href="https://nexo-itnperu.com/" target="_blank"><img src="{{ asset('assets/images/logo-nexo.png') }}"
                            alt="Logo Nexo IT" class="h-16 md:h-20 object-contain"></a>
                </div>

                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-bold tracking-wider mb-6 uppercase">
                    21 Años de Experiencia
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                    La verdadera Integración <br> <span class="text-red-500">Tecnológica de Negocios</span>
                </h1>

                <p class="text-lg text-gray-300 font-light max-w-2xl mx-auto border-t border-gray-700 pt-6">
                    Liderando el mercado de soluciones tecnológicas en Perú, Colombia, Argentina y México.
                </p>
            </div>
        </section>

        <section class="py-20 px-4 md:px-8 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                        Acerca de <span class="text-red-700">Nosotros</span>
                    </h2>
                    <div class="w-20 h-1.5 bg-red-600 rounded-full"></div>

                    <p class="text-gray-600 leading-relaxed text-lg">
                        En <strong>Nexo ITNegocios</strong>, llevamos 21 años consolidándonos como un socio tecnológico de
                        confianza para empresas de todos los tamaños. Nos especializamos en ofrecer soporte técnico continuo
                        y soluciones personalizadas que optimizan los procesos y garantizan la seguridad de los datos de
                        nuestros clientes.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Estamos comprometidos con la excelencia, la innovación y la satisfacción del cliente. Más que un
                        proveedor de servicios, somos su aliado estratégico en el camino hacia el éxito digital.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 relative">
                    <div class="absolute -inset-4 bg-red-100/50 rounded-full blur-3xl -z-10"></div>
                    <img src="{{ asset('assets/images/nosotros1.jpg') }}"
                        class="rounded-2xl shadow-lg w-full h-64 object-cover" alt="Oficina Nexo">
                    <img src="{{ asset('assets/images/nosotros2.jpg') }}"
                        class="rounded-2xl shadow-lg w-full h-64 object-cover" alt="Tecnología Nexo">
                </div>
            </div>
        </section>

        <section class="bg-white py-16 border-y border-gray-100">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Nuestra Filosofía</h2>
                    <p class="text-gray-500 mt-2">Los pilares que sostienen nuestro crecimiento</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-xl hover:border-red-200 transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <i class="bi bi-rocket-takeoff-fill text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Nuestra Misión</h3>
                        <p class="text-gray-600">Proporcionar soluciones tecnológicas de alta calidad que optimicen los
                            procesos de negocio y fomenten la innovación constante.</p>
                    </div>

                    <div
                        class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-xl hover:border-red-200 transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6 text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors">
                            <i class="bi bi-eye-fill text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Nuestra Visión</h3>
                        <p class="text-gray-600">Ser líderes en el mercado de soluciones tecnológicas, reconocidos por
                            nuestra capacidad de transformación y apoyo continuo.</p>
                    </div>

                    <div
                        class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:shadow-xl hover:border-red-200 transition-all duration-300 group">
                        <div
                            class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                            <i class="bi bi-gem text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Nuestros Valores</h3>
                        <ul class="text-gray-600 space-y-3">
                            <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-500 mr-2"></i>
                                Innovación</li>
                            <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-500 mr-2"></i>
                                Confianza</li>
                            <li class="flex items-center"><i class="bi bi-check-circle-fill text-green-500 mr-2"></i>
                                Compromiso</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
