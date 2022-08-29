@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:gap-10 md:justify-center md:items-center w-11/12 m-auto md:w-full p-5">
        <div class="bg-red-500 md:w-6/12 mb-4 md:mb-0">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen login de usuario">
        </div>
        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form action={{ route('login') }} method="POST">

                @csrf

                @if (session('mensaje'))
                    <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                        {{ session('mensaje') }}</P>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">email</label>
                    <input type="email" id="email" name="email" placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror "
                        value="{{ old('email') }}">

                    @error('email')
                        <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                            {{ $message }}</P>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu Password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror ">

                    @error('password')
                        <P class="bg-red-500 text-sm text-center my-2 text-white p-2 rounded-lg uppercase font-bold">
                            {{ $message }}</P>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"> <label class="text-sm text-gray-500" for="remember"> Mantener la sesion abierta</label>
                </div>


                <input type="submit" value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 hover:cursor-pointer transition-colors rounded-lg uppercase w-full p-3 text-white font-bold">

            </form>

        </div>
    </div>
@endsection
