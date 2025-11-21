@extends('layouts.app')
@section('titulo', 'Catálogo de Econegocios y Bionegocios')

@section('contenido')
    <main class="min-h-screen bg-gray-50 pb-12">
        <section id="hero" class="relative h-[400px] flex items-center justify-center text-center">
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('assets/images/fondo_evea-1024x682.jpg') }}" class="w-full h-full object-cover"
                    alt="Fondo Econegocios">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 to-gray-800/90 mix-blend-multiply"></div>
            </div>
            <div class="relative z-10 px-4 max-w-4xl mx-auto mt-[-40px]">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm text-white text-xs font-bold tracking-wider mb-4 border border-white/30">
                    DESCUBRE LO NUESTRO
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-4">
                    Catálogo de <span class="text-[var(--accent-yellow)]">Econegocios</span><br />
                    y <span class="text-[var(--accent-yellow)]">Bionegocios</span>
                </h1>
                <p class="text-lg text-gray-200 font-light max-w-2xl mx-auto">
                    Explora emprendimientos sostenibles que impulsan el desarrollo y transforman el Perú.
                </p>
            </div>
        </section>

        <div class="relative z-20 -mt-12 px-4">
            @livewire('filtrar-negocios')

            <div class="mt-10">
                @livewire('listar-negocios')
            </div>
        </div>
    </main>
@endsection
