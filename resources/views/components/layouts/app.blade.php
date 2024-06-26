<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <div class="w-screen bg-gradient-to-r from-slate-500 to-slate-800 h-12 sticky-0 text-right flex items-center justify-end">
            <a href="{{route('home')}}" class="font-semibold text-white pr-4">Home</a>
            <a href="{{route('todos')}}" class="font-semibold text-white pr-4">My Todos</a>
            <form method="post" action="{{route('logout')}}" class="font-semibold text-white pr-4"><button type="submit">Logout</button>@csrf</form>
        </div>
        {{ $slot }}
    </body>
</html>

