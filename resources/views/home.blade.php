@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    <section class="container mx-auto mt-10">
        @if($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($posts as $post)
                    <div class="">
                        <a href=" {{ route('posts.show', [$post->user, $post]) }} ">
                            <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt="imagen de la publicación de {{ $post->titulo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{ $posts->links('') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif
    </section>
@endsection
