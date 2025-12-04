<div class="space-y-6">
    @if ($comentarios->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($comentarios as $comentario)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center mb-3">
                        <img src="{{ $comentario->usuarios->imagen ? asset('/storage/perfiles/' . $comentario->usuarios->imagen) : asset('assets/images/default-profile.png') }}"
                            class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <a href="{{ route('post.index', $comentario->usuarios->username) }}"
                                class="font-semibold text-gray-800 text-lg">
                                {{ $comentario->usuarios->name }}
                            </a>
                            <div class="flex items-center text-sm text-gray-600">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                        class="bi {{ $i <= $comentario->rating ? 'bi-star-fill' : 'bi-star' }} text-yellow-400 text-base mr-1"></i>
                                @endfor
                                <span
                                    class="ml-2 text-gray-500 text-xs">{{ $comentario->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed mt-4">
                        {{ $comentario->comentario }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm p-6 text-center text-gray-600 border border-gray-100">
            <p class="text-lg font-medium">Sé el primero en dejar un comentario para este negocio.</p>
        </div>
    @endif
</div>
