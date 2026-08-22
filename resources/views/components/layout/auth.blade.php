<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <div class="flex flex-col items-center mb-6">
                <a href="{{ route('home') }}">
                    <img
                        src="https://miraino-katachi.co.jp/wp-content/uploads/2023/09/logo.png"
                        alt="大阪本町のプログラミング IT特化就労移行支援事業所　未来のかたち"
                        class="w-48"
                    >
                </a>
            </div>

            {{ $slot }}
        </div>
    </body>
</html>
