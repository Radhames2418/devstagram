@extends('layouts.app')

@section('titulo')
    Perfil: {{  $user->username  }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="rounded-full" src="{{ asset($user->imagen ? 'perfiles/' . $user->imagen : 'img/usuario.svg') }}" alt="imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-400 text-2xl" >{{  $user->username  }}</p>
                    @auth
                        @if($user->id === auth()->user()->id)
                            <a
                                href="{{ route('perfil.store', $user) }}"
                                class="text-gray-500 hover:text-gray-600 cursor-pointer" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{  $user->follower->count() }}
                    <span class="font-normal">@choice('seguidor|seguidores',  $user->follower->count())</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followings->count() }}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span class="font-normal">Posts</span>
                </p>

                @auth
                    @if($user->id !== auth()->user()->id)
                        @if( !$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input
                                        type="submit"
                                        class="bg-blue-600  text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                        value="seguir"/>
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input
                                        type="submit"
                                        class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-sm font-bold cursor-pointer"
                                        value="Deja de seguir"/>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">
            Publicaciones
        </h2>

        @if($user->posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($user->posts()->latest->paginate($number_pagination) as $post)
                    <div class="">
                        <a href=" {{ route('posts.show', [$user, $post]) }} ">
                            <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt="imagen de la publicación de {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $user->posts()->paginate($number_pagination)->links('') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection
