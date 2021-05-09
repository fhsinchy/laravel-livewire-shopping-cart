<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <nav class="p-5 flex justify-between shadow">
            <a class="rounded text-3xl" href="{{ route('index') }}">Shopping Cart</a>
            <div>
                @auth
                <a class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" href="#">Logout</a>
                @else
                <a class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('login') }}">Login</a>
                <a class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </nav>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
