<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PFE Laravel | {{ $title }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            function getCookie(name) {
                let result = document.cookie.match("(^|[^;]+)\\s*" + name + "\\s*=\\s*([^;]+)")
                return result ? result.pop() : ""
            }
            if (getCookie("theme") === "") {
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 relative">
            @include('layouts.navigation', ['title' => $header])
            <header class="bg-white shadow dark:bg-gray-900">
                <div class="text-center mx-auto py-6 px-4 sm:px-6">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{$title}}
                    </h1>
                </div>
            </header>
            <main class="overflow-hidden">
                @yield('content')
            </main>
        </div>
    </body>
</html>
