<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SmartLab UCM &amp; Trnava</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="page-auth">
    <x-site-header />
    <main class="container min-h-screen py-10">
        <div class="mx-auto w-full max-w-md mt-6 px-6 py-4 bg-white shadow-lg overflow-hidden rounded-lg">
            {{ $slot }}
        </div>
    </main>
    <x-site-footer />
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>
