<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devestagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    {{-- @vite('resources/css/app.js') --}}
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                <a href="/">DevStagram</a>
            </h1>

            <nav class="flex gap-2 items-center">
                <a href={{ route('login') }} class="font-bold hover:cursor-pointer uppercase text-gray-600 text-sm hover:bg-sky-600 p-2 rounded-md hover:text-white transition-colors">Login</a>
                <a href={{ route('register') }} class="font-bold hover:cursor-pointer uppercase text-gray-600 text-sm hover:bg-sky-600 p-2 rounded-md hover:text-white transition-colors">Crear Cuenta</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="text-center mt-10 p-5 text-gray-500 font-bold up">
        DevStagram - Todos los derechos reservados Radhames Encarnacion
        {{ date('Y-m-d')}}
    </footer>
</body>

</html>
