<div>
    {{-- Mensajes flash --}}
    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293A1 1 0 006.293 10.707l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1 3a1 1 0 00-.993.883L9 10v3a1 1 0 001.993.117L11 13v-3a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-800">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- Mostrar aviso o formulario según el estado --}}
    @if ($yaComento)
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-800">
                        Ya has comentado anteriormente.
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Deja tu comentario</h3>

            <form wire:submit.prevent="guardar">
                <div class="mb-4">
                    <textarea wire:model.defer="comentario" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-red-500 focus:border-red-500 text-gray-700 placeholder-gray-400 text-sm"
                        placeholder="Escribe tu comentario aquí..."></textarea>
                    @error('comentario')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 flex items-center">
                    <label class="block text-sm font-medium text-gray-700 mr-3">Tu Valoración:</label>
                    <div class="flex space-x-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <i wire:click="$set('rating', {{ $i }})"
                                class="bi {{ $rating >= $i ? 'bi-star-fill' : 'bi-star' }} text-yellow-400 text-xl cursor-pointer hover:text-yellow-500"></i>
                        @endfor
                    </div>
                    @error('rating')
                        <p class="text-red-500 text-xs mt-1 ml-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-300">
                    Publicar
                </button>
            </form>
        </div>
    @endif
</div>
