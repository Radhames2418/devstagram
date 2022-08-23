@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="md:flex md:gap-10 md:justify-center md:items-center w-11/12 m-auto md:w-full p-5">
        <div class="bg-red-500 md:w-6/12 mb-4 md:mb-0">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen login">
        </div>
        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form action={{ route('login') }} method="POST">

                @csrf

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
                    <div class="flex gap-x-6">
                        <input type="checkbox">
                        <p>Mantener mi sesión abierta</p>
                    </div>
                </div>


                <input type="submit" value="Crear Cuentar"
                    class="bg-sky-600 hover:bg-sky-700 hover:cursor-pointer transition-colors rounded-lg uppercase w-full p-3 text-white font-bold">

            </form>

        </div>
    </div>
@endsection
