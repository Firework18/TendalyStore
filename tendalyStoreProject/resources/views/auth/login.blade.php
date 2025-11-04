@extends('layouts.app')
@section('titulo')
  Bienvenido
@endsection

@section('contenido')
<main class="container mx-auto mt-10 mb-4">
<h2 class="font-extrabold text-center text-3xl mb-3 p-3">Inicia sesión en 
  <span class="text-red-600">TendalyStore</span></h2>
      <div class="md:flex md:justify-center md:gap-10 md:items-center p-3">
        <div class="md:w-4/12">
          <img src="{{asset('assets/images/login.png')}}" alt="Imagen de registro de usuarios">
        </div>
        <div class="class:md:w-1/2 bg-white p-6 rounded-lg shadow-xl">
          <form action="{{route('login')}}" method="POST" novalidate>
            @csrf

            @if (session('mensaje'))
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                {{session('mensaje')}}
              </p>   
            @endif

            <div class="mb-5">
              <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                  Correo
              </label>
              <input 
                  type="email"
                  id="email"
                  name="email"
                  placeholder="Tu correo"
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
              <input type="checkbox" name="remember"> 
              <label  for="" class=" text-sm text-gray-500">Mantener mi sesión abierta</label> 
            </div>

            <input 
                  type="submit"
                  value="Iniciar Sesión"
                  class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                  uppercase font-bold w-full p-3 text-white rounded-lg">

            <div class="text-center">
              <p class="text-gray-600 text-sm">¿No tienes una cuenta?</p>
                <a 
                  href="{{ route('register') }}" 
                  class="text-[var(--color-primary)] hover:text-[var(--color-secondary)] font-bold transition-colors duration-200"
                >
                Crea una aquí
              </a>
        </div>
          </form>
        </div>
        
      </div>
</main>
      
@endsection
</body>
</html>
