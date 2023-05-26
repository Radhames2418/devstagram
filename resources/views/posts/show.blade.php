@extends('layouts.app')


@section('titulo')
    {{  $post->titulo  }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex gap-2">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt="imagen de la publicación de {{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div class="p-3 border-2">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                <p class="mt-5">
                    {{  $post->descripcion  }}
                </p>
            </div>
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth
                <p class="text-xl font-bold text-center mb-4"> Agrega un Nuevo Comentario</p>
                <form action="{{ route('comentarios.store', [$user, $post]) }}" method="POST" novalidate>
                    @csrf

                    @if (session('mensaje'))
                        <p class="bg-green-500 uppercase font-bold text-white my-4 rounded-lg text-sm p-2 text-center">
                            {{ session('mensaje') }}
                        </p>
                    @endif

                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario</label>
                        <textarea
                            name="comentario"
                            id="comentario"
                            rows="5"
                            placeholder="Agrega un Comentario"
                            class="w-full border p-3 w-full rounded-lg
                        @error('comentario')
                            border-red-500
                        @enderror"
                        >{{ old('comentario') }}</textarea>

                        @error('comentario')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Comentar"
                           class="bg-sky-600 hover:bg-sky-700 transition-colors hover:cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y"></div>
            </div>
        </div>
    </div>
@endsection
