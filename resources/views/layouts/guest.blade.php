<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
           <!-- debut -->

        <nav x-data="{ open: false }" class="fixed-top navbar navbar-light bg-info navbar-expand moodle-has-zindex   ">

<!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">

               <img class="card-img " style="height: 50px;" src="{{ asset('images/img3.jpg') }}" alt="">

                </div>

                <!-- Navigation Links -->
                <div class="hidden  space-x-9 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                       <strong class="text-light fs-4 fw-medium">{{ __('MémoirEase') }}</strong>
                    </x-nav-link>
                </div>
                <div class="hidden  space-x-9 sm:-my-px sm:ml-10 sm:flex">
                    <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                       <strong class="text-light">{{ __('Se conncter') }}</strong>
                    </x-nav-link> -->
                </div>
        </nav>
           <!-- fin -->
       
         <div>
                <!-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> -->
            </div>
            <script src="{{ asset('frontend/bootstrap.min.js') }}"></script>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
              
            </div>
        </div>
    </body>
</html>
