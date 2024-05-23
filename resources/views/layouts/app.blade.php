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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <aside>
                    <livewire:layout.sidebar />
                </aside>
                <div class="flex flex-col w-full h-full">
                    <livewire:layout.navigation />
                    <!-- Page Content -->
                    <main class="mt-4 overflow-scroll pl-52">
                        <div class="mx-auto space-y-6 max-w-[95rem] sm:px-6 lg:px-8">
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(function() {
                    let alerts = document.querySelectorAll('.alert');
                    alerts.forEach(function(alert) {
                        alert.style.display = 'none';
                    });
                }, 3000); // 3000 ms = 3 seconds
            });
        </script>
    </body>
</html>
