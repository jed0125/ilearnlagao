<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iLearnLagao') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- Near-black page shell; card content is provided by login/register slots --}}
    <body class="font-sans antialiased bg-[#0a0a0a] text-white">
        <div class="flex min-h-screen flex-col items-center justify-center px-4 py-10">
            <div class="w-full max-w-md rounded-2xl bg-[#1a1a1a] px-8 py-10 shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
