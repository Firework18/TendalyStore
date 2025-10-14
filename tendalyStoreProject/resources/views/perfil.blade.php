@extends('layouts.app')
@section('titulo', 'Mi Perfil')

@section('contenido')
<main class="pt-24 pb-12 bg-[var(--color-background)] min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-3xl ">
        <h1 class="text-4xl font-extrabold text-[var(--color-primary)] mb-8 text-center tracking-wide">Mi Perfil</h1>

        <form id="profileForm" class="space-y-6">
            <!-- Sección de Imagen de Perfil -->
            <div class="flex flex-col items-center mb-8">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[var(--color-primary)] shadow-lg">
                    <img id="profileImage" src="{{ asset('assets/images/default-profile.png') }}" alt="Imagen de Perfil" class="w-full h-full object-cover">
                </div>
                <input type="file" id="imageUpload" name="profile_picture" accept="image/*" class="hidden" disabled>
                <label for="imageUpload" id="imageUploadLabel"
                       class="mt-4 px-5 py-2 border-2 border-[var(--color-primary)] text-[var(--color-primary)] rounded-full shadow-md cursor-pointer hover:bg-red-50 transition-all duration-200 text-sm font-semibold opacity-0 pointer-events-none">
                    Cambiar Imagen
                </label>
            </div>

            <!-- Sección de información personal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="username" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Nombre de usuario</label>
                    <input type="text" id="username" name="username" value={{auth()->user()->username}}
                           class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                           disabled>
                </div>
                <div>
                    <label for="nombre" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value={{auth()->user()->name}}
                           class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                           disabled>
                </div>
                <div>
                    <label for="apellidoPaterno" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Apellido Paterno</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" value={{auth()->user()->apellido_paterno}}
                           class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                           disabled>
                </div>
                <div>
                    <label for="apellidoMaterno" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Apellido Materno</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" value={{auth()->user()->apellido_materno}}
                           class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                           disabled>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" value={{auth()->user()->telefono}}
                           class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                           disabled>
                </div>
            </div>

            <!-- Sección de dirección -->
            <div class="mb-6">
                <label for="direccion" class="block text-sm font-semibold text-[var(--color-text)] mb-1">Dirección</label>
                <textarea id="direccion" name="direccion" rows="3"
                          class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[var(--color-secondary)] focus:border-[var(--color-secondary)] sm:text-base transition-all duration-200"
                          disabled>{{auth()->user()->direccion}}</textarea>
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-end space-x-4 pt-4">
                <button type="button" id="editButton"
                        class="px-8 py-3 bg-[var(--color-primary)] hover:bg-[#a93226] text-white font-bold rounded-full shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-primary)]">
                    Editar Perfil
                </button>
                <button type="submit" id="saveButton"
                        class="hidden px-8 py-3 bg-[var(--color-secondary)] hover:bg-[#bb4900] text-white font-bold rounded-full shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-secondary)]">
                    Guardar Cambios
                </button>
                <button type="button" id="cancelButton"
                        class="hidden px-8 py-3 bg-[var(--color-accent)] hover:bg-[#e09f0c] text-[var(--color-text)] font-bold rounded-full shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-accent)]">
                    Cancelar
                </button>
            </div>
        </form>
    </div>

    <script>
        const profileForm = document.getElementById('profileForm');
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const cancelButton = document.getElementById('cancelButton');
        const inputFields = profileForm.querySelectorAll('input:not([type="file"]), textarea');
        const imageUpload = document.getElementById('imageUpload');
        const imageUploadLabel = document.getElementById('imageUploadLabel');
        const profileImage = document.getElementById('profileImage');

        let originalValues = {};
        let originalImageSrc = profileImage.src;

        function setEditMode(isEditing) {
            inputFields.forEach(field => {
                field.disabled = !isEditing;
                if (isEditing) {
                    field.classList.remove('border-gray-300');
                    field.classList.add('border-[var(--color-secondary)]', 'focus:ring-[var(--color-secondary)]', 'focus:border-[var(--color-secondary)]');
                } else {
                    field.classList.remove('border-[var(--color-secondary)]', 'focus:ring-[var(--color-secondary)]', 'focus:border-[var(--color-secondary)]');
                    field.classList.add('border-gray-300');
                }
            });

            imageUpload.disabled = !isEditing;
            if (isEditing) {
                imageUploadLabel.classList.remove('opacity-0', 'pointer-events-none');
                imageUploadLabel.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                imageUploadLabel.classList.remove('opacity-100', 'pointer-events-auto');
                imageUploadLabel.classList.add('opacity-0', 'pointer-events-none');
            }

            if (isEditing) {
                editButton.classList.add('hidden');
                saveButton.classList.remove('hidden');
                cancelButton.classList.remove('hidden');
            } else {
                editButton.classList.remove('hidden');
                saveButton.classList.add('hidden');
                cancelButton.classList.add('hidden');
            }
        }

        editButton.addEventListener('click', () => {
            inputFields.forEach(field => {
                originalValues[field.id] = field.value;
            });
            originalImageSrc = profileImage.src;
            setEditMode(true);
        });

        cancelButton.addEventListener('click', () => {
            inputFields.forEach(field => {
                field.value = originalValues[field.id];
            });
            profileImage.src = originalImageSrc;
            imageUpload.value = '';
            setEditMode(false);
        });

        profileForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const formData = new FormData(profileForm);
            // Aquí puedes enviar formData a tu backend (por ejemplo, con fetch o axios)
            // formData.append('profile_picture', imageUpload.files[0]); // Asegúrate de adjuntar la imagen si hay una nueva

            console.log("Datos del formulario para enviar:", Object.fromEntries(formData.entries()));

            alert('¡Perfil actualizado con éxito!');
            setEditMode(false);
        });

        imageUpload.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        setEditMode(false);
    </script>
</main>
@endsection
  </body>
</html>
