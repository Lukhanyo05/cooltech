
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CoolTech')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .landscape-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        .nav-link {
            color: #4b5563;
            font-weight: 500;
            transition: color 0.15s;
        }
        .nav-link:hover, .nav-link.active {
            color: #4f46e5;
        }
        .nav-link.active {
            font-weight: 600;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow mb-8">
        <div class="landscape-container flex justify-between items-center py-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <span class="text-3xl font-extrabold text-indigo-700 tracking-tight group-hover:text-cyan-500 transition">
                    CoolTech
                </span>
            </a>
            <ul class="flex space-x-8">
                <li>
                    <a href="{{ url('/') }}"
                       class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/about') }}"
                       class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                </li>
                <li>
                    <a href="{{ url('/contact') }}"
                       class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <main class="flex-1 landscape-container">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="landscape-container">
            <div class="flex justify-between items-center">
                <div>
                    <p>&copy; 2021-{{ date('Y') }} CoolTech. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="{{ route('search') }}" class="text-gray-300 hover:text-white transition">Search</a>
                    <a href="{{ route('legal') }}" class="text-gray-300 hover:text-white transition">Legal</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Cookie Notice -->
    <div class="fixed bottom-0 left-0 right-0 bg-blue-600 text-white p-4 shadow-lg">
        <div class="landscape-container flex justify-between items-center">
            <p>We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.</p>
            <button onclick="this.parentElement.parentElement.style.display='none'" 
                    class="bg-white text-blue-600 px-4 py-2 rounded font-semibold hover:bg-gray-100 transition">
                Accept
            </button>
        </div>
    </div>
</body>
</html>