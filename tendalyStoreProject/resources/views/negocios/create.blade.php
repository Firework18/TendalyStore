@extends('layouts.app') 

@section('titulo', 'Crear Nuevo Negocio - Paso 1')

@section('contenido')
<main class="min-h-screen pt-24 pb-12 bg-[var(--color-background)]">

    <div class="max-w-4xl mx-auto px-2 md:px-0">
        <h1 class="text-3xl md:text-4xl font-bold text-[var(--color-text)] mb-8 text-center">Crear Nuevo Negocio</h1>

        <!-- Barra de Progreso -->
        <div class="flex justify-between items-center mb-12 relative">
            <div class="absolute inset-x-0 top-1/2 h-1 bg-gray-300 transform -translate-y-1/2 z-0"></div>
            <div class="absolute left-0 top-1/2 h-1 bg-[var(--color-primary)] w-[calc((1/4)*100%)] transform -translate-y-1/2 z-10 transition-all duration-500"></div>

            <div class="flex flex-col items-center z-20 w-1/4">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-[var(--color-primary)] text-white flex items-center justify-center font-bold text-sm md:text-base ring-4 ring-[var(--color-primary)]">1</div>
                <span class="mt-2 text-xs md:text-sm font-semibold text-[var(--color-primary)] text-center">Información Básica</span>
            </div>
            <div class="flex flex-col items-center z-20 w-1/4">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold text-sm md:text-base ring-4 ring-gray-200">2</div>
                <span class="mt-2 text-xs md:text-sm text-gray-500 text-center">Información Legal</span>
            </div>
            <div class="flex flex-col items-center z-20 w-1/4">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold text-sm md:text-base ring-4 ring-gray-200">3</div>
                <span class="mt-2 text-xs md:text-sm text-gray-500 text-center">Contacto y Ubicación</span>
            </div>
            <div class="flex flex-col items-center z-20 w-1/4">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 text-gray-700 flex items-center justify-center font-bold text-sm md:text-base ring-4 ring-gray-200">4</div>
                <span class="mt-2 text-xs md:text-sm text-gray-500 text-center">Multimedia y Políticas</span>
            </div>
        </div>

        <div class="bg-white p-6 md:p-10 rounded-xl shadow-2xl">
            <p class="text-gray-500 text-sm mb-8 text-right">Paso <span class="font-bold text-[var(--color-primary)]">1</span> de <span class="font-bold">4</span></p>

            <form action="#" method="POST" class="space-y-8">
                <!-- Sección: Información Básica del Negocio -->
                <div class="p-6 bg-blue-50 bg-opacity-70 rounded-lg border border-blue-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-5">
                        <i class="bi bi-shop text-2xl text-[var(--color-primary)]"></i>
                        <h2 class="text-xl md:text-2xl font-semibold text-[var(--color-text)]">Información Básica del Negocio</h2>
                    </div>
                    <p class="text-gray-600 mb-6">Cuéntanos sobre tu negocio sostenible</p>

                    <div class="space-y-5">
                        <div>
                            <label for="nombre_negocio" class="block text-sm font-medium text-[var(--color-text)] mb-2">Nombre del Negocio <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="bi bi-tag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="nombre_negocio" name="nombre_negocio" placeholder="Ej: Eco Productos Naturales"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label for="descripcion_negocio" class="block text-sm font-medium text-[var(--color-text)] mb-2">Descripción del Negocio <span class="text-red-500">*</span></label>
                            <textarea id="descripcion_negocio" name="descripcion_negocio" rows="4" placeholder="Describe tu negocio, tus productos y qué te hace único..."
                                      class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] resize-none transition-all duration-200"
                                      maxlength="500" required></textarea>
                            <p class="text-right text-xs text-gray-500 mt-1"><span id="charCount">0</span>/500 caracteres</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="categoria_principal" class="block text-sm font-medium text-[var(--color-text)] mb-2">Categoría Principal <span class="text-red-500">*</span></label>
                                <select id="categoria_principal" name="categoria_principal"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                        required>
                                    <option value="">Selecciona una categoría</option>
                                    <option value="alimentacion">Alimentación</option>
                                    <option value="cosmetica">Cosmética y Bienestar</option>
                                    <option value="ecoturismo">Ecoturismo</option>
                                    <option value="energia">Energía Renovable</option>
                                    <option value="moda">Moda Sostenible</option>
                                    <option value="eficiencia">Eficiencia de Recursos</option>
                                </select>
                            </div>
                            <div>
                                <label for="subcategoria" class="block text-sm font-medium text-[var(--color-text)] mb-2">Subcategoría</label>
                                <input type="text" id="subcategoria" name="subcategoria" placeholder="EJ: Alimentos orgánicos"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección: Información del Propietario -->
                <div class="p-6 bg-green-50 bg-opacity-70 rounded-lg border border-green-100 shadow-sm">
                    <div class="flex items-center space-x-3 mb-5">
                        <i class="bi bi-person text-2xl text-[var(--color-primary)]"></i>
                        <h2 class="text-xl md:text-2xl font-semibold text-[var(--color-text)]">Información del Propietario</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="nombre_propietario" class="block text-sm font-medium text-[var(--color-text)] mb-2">Nombre <span class="text-red-500">*</span></label>
                            <input type="text" id="nombre_propietario" name="nombre_propietario" placeholder="Tu nombre"
                                   class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                   required>
                        </div>
                        <div>
                            <label for="apellido_propietario" class="block text-sm font-medium text-[var(--color-text)] mb-2">Apellido <span class="text-red-500">*</span></label>
                            <input type="text" id="apellido_propietario" name="apellido_propietario" placeholder="Tu apellido"
                                   class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                   required>
                        </div>
                        <div>
                            <label for="email_personal" class="block text-sm font-medium text-[var(--color-text)] mb-2">Email Personal <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="bi bi-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="email" id="email_personal" name="email_personal" placeholder="tu@email.com"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                       required>
                            </div>
                        </div>
                        <div>
                            <label for="telefono_personal" class="block text-sm font-medium text-[var(--color-text)] mb-2">Teléfono Personal <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="bi bi-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                <input type="tel" id="telefono_personal" name="telefono_personal" placeholder="EJ: +51 999 999 999"
                                       class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] text-[var(--color-text)] transition-all duration-200"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón Continuar -->
                <div class="flex justify-end pt-6">
                    <button type="submit"
                            class="px-8 py-3 bg-[var(--color-accent)] hover:bg-[#e09f0c] text-[var(--color-text)] font-bold rounded-full shadow-lg transition-colors duration-300 flex items-center space-x-2">
                        <span>Continuar</span>
                        <i class="bi bi-arrow-right-short text-xl"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    // Contador de caracteres para la descripción del negocio
    const descripcionNegocio = document.getElementById('descripcion_negocio');
    const charCount = document.getElementById('charCount');

    if (descripcionNegocio && charCount) {
        descripcionNegocio.addEventListener('input', () => {
            charCount.textContent = descripcionNegocio.value.length;
        });
        // Inicializar el contador si hay texto precargado
        charCount.textContent = descripcionNegocio.value.length;
    }
</script>
@endsection
</body>
</html>