<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CoolTech')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 mr-2 rounded-full border">
                <span class="text-2xl font-bold text-blue-700">CoolTech</span>
            </div>
            <ul class="flex space-x-6">
                <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Home</a></li>
                <li><a href="{{ url('/about') }}" class="text-gray-700 hover:text-blue-600 font-semibold">About</a></li>
                <li><a href="{{ url('/contact') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Contact</a></li>
            </ul>
        </div>
    </nav>
    <main class="flex-1">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-white text-center text-gray-400 py-4 shadow-inner">
        &copy; {{ date('Y') }} CoolTech. All Rights Reserved.
    </footer>
</body>
</html>