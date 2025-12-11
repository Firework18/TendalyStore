<div class="relative flex flex-col lg:flex-row items-center lg:items-end -mt-16 mb-8 gap-6">

    <div class="relative group">
        <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-white shadow-xl bg-white">
            <img src="{{ $user->imagen ? asset('/storage/perfiles/' . $user->imagen) : asset('assets/images/default-profile.png') }}"
                alt="imagen del usuario"
                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                id="profileImagePreview">
        </div>

    </div>

    <div class="text-center lg:text-left flex-grow">
        <h3 class="text-3xl lg:text-lg xl:text-3xl font-bold text-gray-900">{{ $user->name }}
            {{ $user->apellido_paterno }}</h3>
        <p class="text-gray-500 font-medium">@ {{ $user->username }}</p>
        <p class="text-sm text-gray-400 mt-1 flex items-center justify-center lg:justify-start gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            Miembro desde {{ auth()->user()->created_at->format('d M Y') }}
        </p>
    </div>


</div>
