@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}" method="POST" id="dropzone" class="dropzone border-2 w-full h-96 rounded flex flex-col justify-center items-center" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label 
                        for="titulo" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>

                    <input 
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Títtulo de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo')
                            border-red-500
                        @enderror"
                        value="{{old('titulo')}}"
                    >

                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                </div>


                <div class="mb-5">
                    <label 
                        for="descripcion" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion')
                            border-red-500
                        @enderror"
                    >{{old('descripcion')}}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-5">
                    <input 
                        type="hidden"
                        name="imagen"
                        value="{{old('imagen')}}"
                    >

                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input 
                    {{-- type="send" --}}
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white text-center rounded-lg"
                >

            </form>
        </div>
    </div>
@endsection