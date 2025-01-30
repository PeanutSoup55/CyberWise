<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CyberWise</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased dark:text-white/50 flex items-center justify-center min-h-screen bg-gray-100">

        <div class="w-full max-w-7xl bg-white p-12 rounded-lg shadow-lg flex items-center justify-between h-[80vh]">
            
        <!-- Left: Image Section -->
        <div class="w-1/2 flex justify-center">
            <img src="{{ asset('images/cw.jpg') }}" alt="Logo" class="w-90 h-90 object-contain">
        </div>

        <!-- Right: Login/Register Section -->
        <div class="w-1/2 text-center">
            <h1 class="text-3xl  mb-6 text-black">Welcome</h1>

            @if (Route::has('login'))
                <div class="space-y-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block bg-blue-500 text-white py-2 px-4 rounded-lg w-full">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block bg-green-500 text-white py-2 px-4 rounded-lg w-full">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block bg-gray-700 text-white py-2 px-4 rounded-lg w-full">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
    </body>
</html>
