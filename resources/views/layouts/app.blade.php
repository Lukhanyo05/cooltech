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
        <div class="landscape-container flex justify-between items-center py-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <img src="{{ asset('images/logo.png') }}"
                     alt="CoolTech Logo"
                     class="h-12 w-12 rounded-xl shadow-xl ring-2 ring-cyan-400 group-hover:scale-105 transition duration-150" />
                <span class="text-3xl font-extrabold text-indigo-700 tracking-tight group-hover:text-cyan-500 transition">
                    
                </span>
            </a>
            <ul class="flex space-x-8">
                <li>
                    <a href="{{ url('/') }}"
                       class="text-gray-700 hover:text-indigo-600 font-semibold px-3 py-2 transition-colors rounded-lg @if(request()->is('/')) bg-indigo-50 @endif">
                       
                       Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"
                       class="text-gray-700 hover:text-indigo-600 font-semibold px-3 py-2 transition-colors rounded-lg @if(request()->is('about')) bg-indigo-50 @endif">
                       About
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}"
                       class="text-gray-700 hover:text-indigo-600 font-semibold px-3 py-2 transition-colors rounded-lg @if(request()->is('contact')) bg-indigo-50 @endif">
                       Contact
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="flex-1 landscape-container">
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <!-- Cookie Notice Component -->
    <x-cookie-notice />

</body>
</html>