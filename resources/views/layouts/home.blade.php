<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC]">
        <x-header/> 
        <main>
            @yield('content')
        </main>
        <div class="h-2 bg-[#2F938D] w-full rounded-b-full mb-10"></div>
        <x-footer/>
    </body>
</html>
