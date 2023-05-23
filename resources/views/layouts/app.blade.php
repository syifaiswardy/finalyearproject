<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->

        <!-- Customer Styles -->
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
        <link href="{{url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap')}}" rel="stylesheet">
            
        <link href="{{url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap')}}" rel="stylesheet">



        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{url('assets/css/font-awesome.css')}}">

        <link rel="stylesheet" href="{{url('assets/css/templatemo-klassy-cafe.css')}}">

        <link rel="stylesheet" href="{{url('assets/css/owl-carousel.css')}}">

        <link rel="stylesheet" href="{{url('assets/css/lightbox.css')}}">

        <style>
            a{
                color:#D8B237; 
            }
            a:hover{
                color:black;
            }
        </style>

        <!-- Admin Styles -->


        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
