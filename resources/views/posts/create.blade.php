@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center md:justify-between w-11/12 m-auto">
        <div class="md:w-1/2 px-10">
            <form action={{ route('imagenes.store') }} id="dropzone" class="dropzone border-dashed border-2 w-full h-96 flex flex-col justify-center items-center" method="POST" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action={{ route('register') }} method="POST">

                @csrf

                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror "
                        value="{{ old('titulo') }}">

                    @error('titulo')
                        <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                            {{ $message }}</P>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                            {{ $message }}</P>
                    @enderror
                </div>

                <input type="submit" value="Crear publicacion"
                class="bg-sky-600 hover:bg-sky-700 hover:cursor-pointer transition-colors rounded-lg uppercase w-full p-3 text-white font-bold">

            </form>
        </div>
    </div>
@endsection
