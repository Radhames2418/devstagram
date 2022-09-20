@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container md:w-10/12 mx-auto md:flex">
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
                <p class="mt-5 break-words text-justify">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action={{ route('posts.destroy', $post)}} method="POST" >
                        @method('DELETE')
                        @csrf

                        <input type="submit"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                            value="Eliminar Publicacion">
                    </form>
                @endif
            @endauth
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

                <div class="bg-white shadow mb-5 max-h-96 overflow-auto mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href=" {{ route('posts.index', $comentario->user->username) }} " class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios Aun !!!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
