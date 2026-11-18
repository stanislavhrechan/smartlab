<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/css/user-pages/header_footer.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] page-site">
        <x-header/> 
        <main>
            @yield('content')
        </main>
        <x-footer/>
    </body>
</html>
