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
        <div class="absolute inset-0 z-0">
            <img src="./image/bg_3.jpg" fetchpriority="high" class="w-full h-full object-cover" alt="">
        </div>
        <div class="relative z-10 min-h-screen bg-gray-100/65 pt-6 px-5 md:px-20 flex flex-col justify-center items-center sm:pt-0">
            <div class="w-full max-w-md mt-6 px-6 py-4 bg-white shadow-lg overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
            <div class="absolute left-5 bottom-2 flex gap-5">
                <span class="font-semibold text-sm text-black/70 cursor-pointer">© SmartLab</span>
                <a class="font-semibold text-sm text-black/70 hover:text-black/90 cursor-pointer">Privacy & Terms</a>
            </div>
        </div>
    </body>
</html>
