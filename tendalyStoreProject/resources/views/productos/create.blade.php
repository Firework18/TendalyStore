@extends('layouts.app') 

@section('titulo', 'Crear Nuevo Producto')

@push('styles')
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush

@section('contenido')


    <div class="md:flex md:items-center p-5">
        <div class="md:w-1/2 px-10">
            imagen aqui
        </div>
        <div class="md:w-1/2 px-10">
            <form action="{{route('register')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
              <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                  Nombre
              </label>
              <input 
                  type="text"
                  id="name"
                  name="name"
                  placeholder="Tu nombre"
                  class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                  value="{{old('name')}}">
              @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
              @enderror
            </div>
            <div class="mb-5">
              <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                  Usuario
              </label>
              <input 
                  type="text"
                  id="username"
                  name="username"
                  placeholder="Tu nombre de usuario"
                  class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror"
                  value="{{old('username')}}">
              @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
              @enderror
            </div>
            <div class="mb-5">
              <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                  Correo
              </label>
              <input 
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Tu correo de registro"
                  class="border p-3 w-full rounded-lg  @error('email') border-red-500 @enderror"
                  value="{{old('email')}}">
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                @enderror
            </div>
            <div class="mb-5">
              <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                  Contraseña
              </label>
              <input 
                  type="password"
                  id="password"
                  name="password"
                  placeholder="Tu contraseña de registro"
                  class="border p-3 w-full rounded-lg  @error('password') border-red-500 @enderror"
                  >
                  @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
              @enderror
            </div>
            <div class="mb-5">
              <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                  Confirmar contraseña
              </label>
              <input 
                  type="password"
                  id="password_confirmation"
                  name="password_confirmation"
                  placeholder="Tu contraseña de registro"
                  class="border p-3 w-full rounded-lg "
                  >
            </div>
            
            <input 
                  type="submit"
                  value="Crear Cuenta"
                  class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                  uppercase font-bold w-full p-3 text-white rounded-lg">
          
                  <div class="text-center">
                  <p class="text-gray-600 text-sm">¿Ya tienes una cuenta?</p>
                    <a 
                      href="{{ route('login') }}" 
                      class="text-[var(--color-primary)] hover:text-[var(--color-secondary)] font-bold transition-colors duration-200">
                    Ingresa aquí
                    </a>
            </div>
          </form>
        </div>
    </div>


@push('scripts')

@endpush
   
@endsection
</body>
</html>