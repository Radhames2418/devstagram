@extends('layouts.app')


@section('titulo')
    {{  $post->titulo  }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex gap-2">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt="imagen de la publicación de {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-3">
                @auth
                    @if($post->checkLike(auth()->user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                            @csrf
                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif
                @endauth
                    <p class="font-bold ">{{ $post->likes->count() }} <span class="font-normal">Likes</span></p>
                </div>
            <div class="p-3 border-2 mb-3">
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>

                <p class="mt-5">
                    {{  $post->descripcion  }}
                </p>
            </div>

            @auth
                @if($post->user_id == auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="flex justify-center gap-2 bg-red-600 hover:bg-red-700 transition-colors hover:cursor-pointer  font-bold  p-3 text-white rounded-lg" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg> Eliminar Publicacion</button>
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
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

                <div class="bg-white mt-10 shadow mb-5 max-h-96 overflow-y-scroll">
                    @if($post->comentarios->count())
                        <div class="">
                            @foreach($post->comentarios as $comentario)
                                <div class="p-5 border-gray-300 border-b">
                                    <a class="font-bold" href="{{ route('posts.index', $comentario->user)  }}">{{ $comentario->user->username }}</a>
                                    <p>{{ $comentario->comentario }}</p>
                                    <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="p-10 text-center">No hay comentarios aun</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
