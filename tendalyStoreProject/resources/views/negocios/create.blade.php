@extends('layouts.app') 

@section('titulo', 'Crear Nuevo Negocio - Paso 1')

@push('styles')
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush

@section('contenido')

<main class="min-h-screen  bg-[var(--color-background)]">
    <div class="container mx-auto px-4 py-8 bg">
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
                
                    <form action="/target" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col
                    justify-center items-center">
                    
                    </form>
             
                
                <p class="text-gray-500 text-sm mt-2">Formato: JPG, PNG. Tamaño máximo: 2MB</p>
            </div>
        </section>


        <form action="" method="" novalidate>
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
                <label for="nombreNegocio" class="block text-gray-700 text-sm font-semibold mb-2">Nombre del Negocio <span class="text-red-500">*</span></label>
                <input type="text" name="nombreNegocio" id="nombreNegocio" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('nombreNegocio')
                border-red-500    
                @enderror" 
                value="{{old('nombreNegocio')}}"
                placeholder="Ej: Eco Productos Naturales">
                @error('nombreNegocio')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcionNegocio" class="block text-gray-700 text-sm font-semibold mb-2">Descripción del Negocio</label>
                <textarea id="descripcionNegocio" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green h-24 resize-none @error('nombreNegocio')
                border-red-500    
                @enderror" 
                placeholder="Describe tu negocio, tus productos y qué te hace único...">{{old('descripcionNegocio')}}</textarea>
                <p class="text-right text-gray-500 text-sm mt-1"><span id="charCount">0</span>/500 caracteres</p>
                @error('nombreNegocio')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 text-sm font-semibold mb-2">Categoría <span class="text-red-500">*</span></label>
                <select id="categoria" class="w-full px-4 py-2  border-gray-300 borderrounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green">
                    <option value="">Selecciona una categoría</option>
                    <!-- Add more categories as needed -->
                </select>
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
                <label for="direccionCompleta" class="block text-gray-700 text-sm font-semibold mb-2">Dirección Completa <span class="text-red-500">*</span></label>
                <input type="text" name="direccionCompleta" id="direccionCompleta" class="w-full px-4 py-2  borderrounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green @error('nombreNegocio')
                border-red-500    
                @enderror" 
                placeholder="Calle, número, urbanización...">
                @error('nombreNegocio')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="departamento" class="block text-gray-700 text-sm font-semibold mb-2">Departamento <span class="text-red-500">*</span></label>
                    <select id="departamento" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green">
                        <option value="">Selecciona departamento</option>
                        <!-- Add more departments as needed -->
                    </select>
                </div>
                <div>
                    <label for="provincia" class="block text-gray-700 text-sm font-semibold mb-2">Provincia <span class="text-red-500">*</span></label>
                    <input type="text" id="provincia" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green" placeholder="Provincia">
                </div>
            </div>

            <div>
                <label for="distrito" class="block text-gray-700 text-sm font-semibold mb-2">Distrito</label>
                <input type="text" id="distrito" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green" placeholder="Distrito">
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
                    <label for="emailNegocio" class="block text-gray-700 text-sm font-semibold mb-2">Email del Negocio <span class="text-red-500">*</span></label>
                    <input type="email" id="emailNegocio" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green" placeholder="contacto@tunegocio.com">
                </div>
                <div>
                    <label for="telefonoNegocio" class="block text-gray-700 text-sm font-semibold mb-2">Teléfono del Negocio <span class="text-red-500">*</span></label>
                    <input type="tel" id="telefonoNegocio" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-tendaly-green" placeholder="+51 999 999 999">
                </div>
            </div>
        </section>


        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 mb-8">
            <a href="{{route('perfil')}}" class="px-6 py-2 border bg-red-500 border-gray-300 rounded-lg text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-gray-300">Cancelar</a>
            <input type="submit" value="Registrar Negocio" 
            class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-tendaly-green focus:ring-opacity-50 flex items-center space-x-2">
        </div>
        </form>
        
    </div>
    </main>

    
@endsection
</body>
</html>