@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src={{ asset('uploads') . '/' . $post->imagen }} alt="nombre de la imagen {{ $post->nombre }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div class="md:p-0 p-3">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agregar un nuevo Comentario</p>

                    @if (session('mensaje'))
                        <P class="bg-green-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                            {{ session('mensaje') }}
                        </P>
                    @endif

                    <form method="POST" action={{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}>

                        @csrf

                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un
                                comentario</label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario"
                                class="border resize-none h-32 p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>

                            @error('comentario')
                                <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                                    {{ $message }}</P>
                            @enderror
                        </div>

                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 hover:cursor-pointer transition-colors rounded-lg uppercase w-full p-3 text-white font-bold">
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
