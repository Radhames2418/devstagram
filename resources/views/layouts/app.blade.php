<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>DevStragram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">DevStagram</h1>

                <nav class="flex gap-2 items-center">
                    {{--  NO AUTENTICADO  --}}
                    @guest
                            <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                            <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                    @endguest

                    {{--  AUTENTICADO  --}}
                    @auth
                        <a href="#" class="font-bold text-gray-600 text-m">
                            Hola :
                            <span class="font-normal">
                                {{ auth()->user()->username  }}
                            </span>
                        </a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Cerrar Sesión</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados
            {{ now()->year }}
        </footer>
    </body>
</html>
