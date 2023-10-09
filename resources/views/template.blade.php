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
    <body class="font-sans antialiased">
       <main>
        <div class="container">
            @yield('content')
       
             <script src="{{ asset('frontend/bootstrap.min.js') }}"></script>
                <!-- <script src="{{ asset('js/app.js') }}"></script> -->
            </div>
       </main>
        
    </body>
</html>
