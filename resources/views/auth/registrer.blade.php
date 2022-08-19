@extends('layouts.app')


@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:gap-10 md:justify-center md:items-center w-11/12 m-auto md:w-full p-5">
        <div class="md:w-6/12 mb-4 md:mb-0">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form>
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">username</label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Tu E-mail de Registro" class="border p-3 w-full rounded-lg">
                </div>


                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu Password" class="border p-3 w-full rounded-lg">
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu password" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Crear Cuentar" class="bg-sky-600 hover:bg-sky-700 hover:cursor-pointer transition-colors rounded-lg uppercase w-full p-3 text-white font-bold">

            </form>
        </div>
    </div>
@endsection
