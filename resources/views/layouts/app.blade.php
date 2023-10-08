<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>


    <body class="font-sans antialiased">
        <x-banner />

        <style>
            body {
                background-size: cover;
                background-position: center;
                animation: changeBackground 20s infinite; /* Change background every 10 seconds */
            }
      
            @keyframes changeBackground {
                0% {
                    background-image: url('https://tecdn.b-cdn.net/img/new/slides/041.jpg');
                }
                33.33% {
                    background-image: url('https://tecdn.b-cdn.net/img/new/slides/042.jpg');
                }
                66.66% {
                    background-image: url('https://tecdn.b-cdn.net/img/new/slides/043.jpg');
                }
                100% {
                    background-image: url('https://tecdn.b-cdn.net/img/new/slides/044.jpg');
                }
            }
        </style>

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 fixed">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewire('livewire-ui-modal')

        @stack('modals')

        @livewireScripts

    </body>
</html>
