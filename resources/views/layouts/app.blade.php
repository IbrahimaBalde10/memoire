<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- bootstrap -->
        <!-- C:\laragon\www\MonProjet\public\frontend\bootstrap.min.css -->
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/styl.css') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow mx-4">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- C:\laragon\www\MonProjet\public\frontend\bootstrap.min.js -->
             <script src="{{ asset('frontend/bootstrap.min.js') }}"></script>
                <!-- <script src="{{ asset('js/app.js') }}"></script> -->
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
