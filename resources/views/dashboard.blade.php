@extends('layouts.app')

@section('titulo')
    Tu cuenta
@endsection


@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:8/12 lg:6/12 md:flex">
            <div class="md:w-8/12 lg:6/12 px-5">
                <img class="w-2/3 m-auto" src="{{ asset('img/usuario.svg') }}" alt="Fondo de usuario">
            </div>
            <div class="md:w-8/12 lg:6/12 px-5">
                <p class="text-2xl text-gray-700 ">{{ auth()->user()->username }}</p>
            </div>
        </div>
    </div>

@endsection
