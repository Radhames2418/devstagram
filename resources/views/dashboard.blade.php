@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-10/12 md:8/12 lg:6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:6/12 px-5">
                <img class="w-2/3 m-auto" src="{{ asset('img/usuario.svg') }}" alt="Fondo de usuario">
            </div>
            <div class="md:w-8/12 lg:6/12 px-5 flex flex-col md:justify-center items-center md:items-start py-10 md:py-10">
                <p class="text-2xl text-gray-700 ">{{ $user->username }}</p>

                <p class="text-gray-800  text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal"> Seguidores</span>
                </p>

                <p class="text-gray-800  text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Siguiendo</span>
                </p>

                <p class="text-gray-800  text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>


    <section class="container w-10/12 mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="">
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                            <img src={{ asset('uploads') . '/' . $post->imagen }} alt="imagen del post {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{-- Paginar registro en las vistas --}}
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones !!!</p>
        @endif

    </section>
@endsection
