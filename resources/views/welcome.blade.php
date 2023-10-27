<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex gap-2">
                    @auth
                        <div class="p-2 bg-red-600 hover:bg-red-700 rounded-md">
                            <a href="{{ url('/dashboard') }}" class="font-semibold dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        </div>
                    @else
                        <div class="p-2 bg-red-600 hover:bg-red-700 rounded-md text-center text-white">
                            <a href="{{ route('login') }}" class="font-semibold dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="p-2 bg-red-600 hover:bg-red-700 rounded-md text-center text-white">
                            <a href="{{ route('register') }}" class="font-semibold dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        </div>
                            @endif
                    @endauth
                </div>
            @endif
            <div>
                <img src="https://assets.nflxext.com/ffe/siteui/vlv3/dace47b4-a5cb-4368-80fe-c26f3e77d540/50863f1d-166c-4c7e-8423-e366e60229dc/US-en-20231023-popsignuptwoweeks-perspective_alpha_website_large.jpg" alt="">
            </div>
        </div>
    </body>
</html>
