@extends('dashboard.user.app') 

@section('titulo', 'Crear Nuevo Negocio - Paso 1')

@push('styles')
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush

@section('contenido')

<main class="min-h-screen  bg-[var(--color-background)]">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Registrar Nuevo Negocio</h2>
        <p class="text-gray-600 mb-6">Completa el formulario para registrar tu negocio en nuestra plataforma</p>

        <!-- Section: Foto del Negocio -->
        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Foto del Negocio</h3>
            </div>
            <p class="text-gray-600 mb-4">Sube una imagen que represente tu negocio (logo o foto del negocio)</p>

            <div class="mb-4">
                    <!-- Dropzone-->
                    <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col
                    justify-center items-center">
                    @csrf
                    </form>
                <p class="text-gray-500 text-sm mt-2">Formato: JPG, PNG. Tamaño máximo: 2MB</p>
            </div>
        </section>


        <form action="{{route('negocio.store')}}" method="POST" novalidate>
        @csrf
        <!-- Section: Información Básica del Negocio -->
        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Información Básica del Negocio</h3>
            </div>
            <p class="text-gray-600 mb-4">Cuéntanos sobre tu negocio sostenible</p>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-semibold mb-2">Nombre del Negocio <span class="text-red-500">*</span></label>
                <input type="text" name="nombre" id="nombre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('nombre')
                border-red-500    
                @enderror" 
                value="{{old('nombre')}}"
                placeholder="Ej: Eco Productos Naturales">
                @error('nombre')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 text-sm font-semibold mb-2">Descripción del Negocio</label>
                <textarea id="descripcion" name="descripcion" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green h-24 resize-none @error('descripcion')
                border-red-500    
                @enderror" 
                placeholder="Describe tu negocio, tus productos y qué te hace único...">{{old('descripcion')}}</textarea>
                <p class="text-right text-gray-500 text-sm mt-1"><span id="charCount">0</span>/500 caracteres</p>
                @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="mb-4">
                <label for="historia" class="block text-gray-700 text-sm font-semibold mb-2">Historia del Negocio</label>
                <textarea id="historia" name="historia" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green h-24 resize-none @error('historia')
                border-red-500    
                @enderror" 
                placeholder="Describe tu la historia de tu negocio...">{{old('historia')}}</textarea>
                <p class="text-right text-gray-500 text-sm mt-1"><span id="charCount">0</span>/500 caracteres</p>
                @error('historia')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria_negocio_id" class="block text-gray-700 text-sm font-semibold mb-2">Categoría <span class="text-red-500">*</span></label>
                <select id="categoria_negocio_id" name="categoria_negocio_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('categoria_negocio_id')
                border-red-500    
                @enderror">
                    <option value="">Selecciona una categoría</option>
                    @foreach ( $categorias as $categoria )
                        <option value="{{$categoria->id}}"
                            {{ old('categoria_negocio_id') == $categoria->id ? 'selected' : '' }}
                            >{{$categoria->nombre}}</option>
                    @endforeach
                </select>
                @error('categoria_negocio_id')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </section>

        <!-- Section: Dirección y Ubicación -->
        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Dirección y Ubicación</h3>
            </div>

            <div class="mb-4">
                <label for="ubicacion" class="block text-gray-700 text-sm font-semibold mb-2">Dirección Completa <span class="text-red-500">*</span></label>
                <input type="text" name="ubicacion" id="ubicacion" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('ubicacion')
                border-red-500    
                @enderror" 
                placeholder="Calle, número, urbanización...">
                @error('ubicacion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="departamento_id" class="block text-gray-700 text-sm font-semibold mb-2">Departamento <span class="text-red-500">*</span></label>
                    <select id="departamento_id" name="departamento_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('departamento_id')
                         border-red-500    
                    @enderror">
                        <option value="">Selecciona departamento</option>
                        @foreach ( $departamentos as $departamento )
                            <option value="{{ $departamento->id }}"
                                {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}
                                >{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                    @enderror
                </div>
                <div>
                    <label for="provincia_id" class="block text-gray-700 text-sm font-semibold mb-2">Provincia <span class="text-red-500">*</span></label>
                    <select id="provincia_id" name="provincia_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('provincia_id')
                         border-red-500    
                    @enderror" disabled>
                        <option value="">Selecciona provincia</option>
                    </select>
                    @error('provincia_id')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="distrito_id" class="block text-gray-700 text-sm font-semibold mb-2">Distrito</label>
                <select id="distrito_id" name="distrito_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('distrito_id')
                         border-red-500    
                    @enderror" disabled>
                    <option value="">Selecciona distrito</option>
                </select>  
                @error('distrito_id')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror          
            </div>
        </section>

        <!-- Section: Datos de Contacto del Negocio -->
        <section class="bg-white p-6 rounded-lg custom-shadow mb-6">
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-tendaly-green mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 6h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-800">Datos de Contacto del Negocio</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="correo" class="block text-gray-700 text-sm font-semibold mb-2">Email del Negocio <span class="text-red-500">*</span></label>
                    <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('correo')
                    border-red-500    
                    @enderror" 
                    value="{{old('correo')}}"
                    placeholder="contacto@tunegocio.com">
                    @error('correo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                    @enderror
                </div>
                <div>
                    <label for="telefono" class="block text-gray-700 text-sm font-semibold mb-2">Teléfono del Negocio <span class="text-red-500">*</span></label>
                    <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('telefono')
                    border-red-500    
                    @enderror" 
                    value="{{old('telefono')}}"
                    placeholder="+51 999 999 999">
                    @error('telefono')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                    @enderror
                </div>
            </div>
        </section>

        <div class="mb-5">
            <input
                name="imagen"
                type="hidden"
                value="{{old('imagen')}}"
            />
            @error('imagen')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 mb-8">
            <a href="{{route('dashboard')}}" class="px-6 py-2 border bg-red-500 border-gray-300 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-gray-300 ">Cancelar</a>
            <input type="submit" value="Registrar Negocio" 
            class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-tendaly-green focus:ring-opacity-50 flex items-center space-x-2">
        </div>
        </form>
        
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
                provinciaSelect.innerHTML += `<option value="${p.id}">${p.nombre}</option>`;
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
                distritoSelect.innerHTML += `<option value="${d.id}">${d.nombre}</option>`;
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