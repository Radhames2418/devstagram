@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:8/12 lg:6/12 flex flex-col items-center md:flex-row">
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

@endsection
