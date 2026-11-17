<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <link rel="icon" type="image/png" href="./image/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="./image/favicon/favicon.svg" />
        <link rel="shortcut icon" href="./image/favicon/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="./image/favicon/apple-touch-icon.png" />
        <link rel="manifest" href="./image/favicon/site.webmanifest" /> -->

        <title>{{ 'SmartLab' }}</title>

        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased relative">
        <div class="relative z-10 ">
            @yield('content')
        </div>
    </body>
</html>
