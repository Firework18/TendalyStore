@extends('dashboard.user.app')

@section('titulo', 'Crear Nuevo Negocio - Paso 1')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')

    <main class="min-h-screen  bg-[var(--color-background)]">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Editar Negocio: {{ $negocio->nombre }}</h2>
            <p class="text-gray-600 mb-6">Completa el formulario para editar tu negocio en nuestra plataforma</p>

            @livewire('editar-negocio', ['negocio' => $negocio])

        </div>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const departamentoSelect = document.getElementById('departamento_id');
                const provinciaSelect = document.getElementById('provincia_id');
                const distritoSelect = document.getElementById('distrito_id');

                // Cuando cambie el departamento
                departamentoSelect.addEventListener('change', async (e) => {
                    const departamentoId = e.target.value;
                    provinciaSelect.innerHTML = '<option value="">Selecciona provincia</option>';
                    distritoSelect.innerHTML = '<option value="">Selecciona distrito</option>';
                    distritoSelect.disabled = true;

                    if (departamentoId) {
                        const res = await fetch(`/provincias/${departamentoId}`);
                        const provincias = await res.json();

                        provincias.forEach(p => {
                            provinciaSelect.innerHTML +=
                                `<option value="${p.id}">${p.nombre}</option>`;
                        });

                        provinciaSelect.disabled = false;
                    } else {
                        provinciaSelect.disabled = true;
                    }
                });

                // Cuando cambie la provincia
                provinciaSelect.addEventListener('change', async (e) => {
                    const provinciaId = e.target.value;
                    distritoSelect.innerHTML = '<option value="">Selecciona distrito</option>';

                    if (provinciaId) {
                        const res = await fetch(`/distritos/${provinciaId}`);
                        const distritos = await res.json();

                        distritos.forEach(d => {
                            distritoSelect.innerHTML +=
                                `<option value="${d.id}">${d.nombre}</option>`;
                        });

                        distritoSelect.disabled = false;
                    } else {
                        distritoSelect.disabled = true;
                    }
                });
            });
        </script>
    @endpush

@endsection
</body>

</html>
