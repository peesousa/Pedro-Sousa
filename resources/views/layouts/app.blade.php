<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Portfólio de Pedro Sousa - Desenvolvedor Full Stack especialista em TALL Stack e Laravel.">

        <title>Pedro Sousa | Desenvolvedor Laravel</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-black">
        @include('components.intro')
        {{-- Header --}}
        @include('layouts.header')

        {{-- Main --}}
        <main>
            main
        </main>

        {{-- Footer --}}
        @include('layouts.footer')

        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
