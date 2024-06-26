<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $header, 'Laravel' }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="flex h-screen">
                <livewire:layout.sidebar title="{{ $header }}" />
                <div class="flex flex-col w-full h-full">
                    {{-- <livewire:layout.navigation /> --}}
                    <!-- Page Heading -->
                    {{-- @if (isset($header))
                        <header class="shadow bg-sky-500">
                            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif --}}

                    <!-- Page Content -->
                    <main class="ml-10 overflow-scroll pl-60">
                        {{ $slot }}
                        {{-- @yield('content') --}}
                    </main>
                </div>
            </div>
        </div>
        @livewireScripts
        {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    </body>
</html>
