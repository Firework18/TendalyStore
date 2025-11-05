@extends('dashboard.user.app') 

@section('titulo', 'Crear Nuevo Producto')

@push('styles')
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
@endpush

@section('contenido')

<main class="container mx-auto mt-10 mb-4">
  <div class="mb-5 flex items-center text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
        <i class="bi bi-chevron-left mr-1 text-base"></i>
        <a href="{{route('dashboard.negocio')}}" class="text-sm font-normal text-[#555]">Volver al negocio</a>
    </div>
<h2 class="font-extrabold text-center text-3xl mb-3 p-3">Crear Nuevo Producto </h2>

    <div class="md:flex md:items-center p-5">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col
                    justify-center items-center">
                    @csrf
                    </form>
                <p class="text-gray-500 text-sm mt-2">Formato: JPG, PNG. Tamaño máximo: 2MB</p>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('producto.store')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
              <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                  Nombre
              </label>
              <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  placeholder="Nombre del producto"
                  class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                  value="{{old('nombre')}}">
              @error('nombre')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
              @enderror
            </div>

            <div class="mb-5">
              <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                  Descripcion
              </label>
              <textarea 
                  id="descripcion"
                  name="descripcion"
                  placeholder="Descripcion del producto"
                  class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror"
                  >{{old('descripcion')}}</textarea>
              @error('descripcion')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
              @enderror
            </div>
            <div class="mb-5">
              <label for="precio" class="mb-2 block uppercase text-gray-500 font-bold">
                  Precio
              </label>
              <input 
                  type="number"
                  id="precio"
                  name="precio"
                  placeholder="Ej: 2.0, 50.0"
                  class="border p-3 w-full rounded-lg  @error('precio') border-red-500 @enderror"
                  value="{{old('precio')}}">
                  @error('precio')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                  @enderror
            </div>
            <div class="mb-5">
              <label for="stock" class="mb-2 block uppercase text-gray-500 font-bold">
                  Stock
              </label>
              <input 
                  type="number"
                  id="stock"
                  name="stock"
                  placeholder="Ej: 1,2,3"
                  class="border p-3 w-full rounded-lg  @error('stock') border-red-500 @enderror"
                  value="{{old('stock')}}"
                  >
                  @error('stock')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                  @enderror
            </div>
            <div class="mb-5">
              <label for="unidad_medida" class="mb-2 block uppercase text-gray-500 font-bold">
                  Unidad de Medida
              </label>
              <input 
                  type="text"
                  id="unidad_medida"
                  name="unidad_medida"
                  placeholder="Ej: lt, kg, un"
                  value="{{old('unidad_medida')}}"
                  class="border p-3 w-full rounded-lg  @error('unidad_medida') border-red-500 @enderror"
                  >
                  @error('unidad_medida')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>   
                  @enderror
            </div>
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
            <input type="submit"value="Crear Producto" class="bg-red-500 hover:bg-red-700 transition-colors cursor-pointer
                  uppercase font-bold w-full p-3 text-white rounded-lg">

          </form>
        </div>
    </div>
</main>

   
@endsection
</body>
</html>