<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100">
            <div class="flex items-center justify-between px-8 py-6 max-w-7xl mx-auto">
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="Negodux Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold tracking-tight">Negodux</span>
                    </a>
                </div>
                <div class="flex items-center gap-8">
                    <a href="/umkm" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">UMKM</a>
                    <a href="#" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">Mentors</a>
                    <a href="/faq" class="text-xs font-bold uppercase tracking-wide hover:text-gray-600">FAQ</a>
                    
                    @auth
                        <div class="relative group">
                            <button class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50 bg-gray-900 text-white border-transparent hover:bg-gray-800 flex items-center gap-2">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold uppercase tracking-wide hover:bg-gray-50 rounded-lg text-gray-900">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50 bg-gray-900 text-white border-transparent hover:bg-gray-800">Login / Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="flex-1 flex flex-col items-center pt-32 pb-12 px-4" style="padding-top: 180px;">
            <div class="w-full max-w-sm mt-8" style="max-width: 400px;">
                <!-- Back Link -->
                <div class="mb-6">
                    <a href="/" class="flex items-center gap-2 text-xs font-bold text-gray-900 hover:text-gray-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Back
                    </a>
                </div>

                <!-- Card -->
                <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
                    <h1 class="text-2xl font-bold mb-2 text-gray-900">Welcome</h1>
                    <p class="text-sm text-gray-500 mb-6">Login or create an account to continue</p>

                    <!-- Toggle -->
                    <div class="bg-gray-100 p-1 rounded-lg flex mb-6">
                        <button type="button" id="login-tab" class="flex-1 py-2 text-sm font-medium rounded-md bg-white shadow-sm text-gray-900 transition-all">Login</button>
                        <button type="button" id="register-tab" class="flex-1 py-2 text-sm font-medium rounded-md text-gray-500 hover:text-gray-900 transition-all">Register</button>
                    </div>

                    <!-- Login Form -->
                    <form id="login-form" action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="login-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Email</label>
                            <input type="email" id="login-email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="login-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Password</label>
                            <input type="password" id="login-password" name="password" required placeholder="........" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-3 rounded-md hover:bg-gray-800 transition-colors mt-2">
                            Login
                        </button>
                    </form>

                    <!-- Register Form -->
                    <form id="register-form" action="{{ route('register') }}" method="POST" class="space-y-4 hidden">
                        @csrf
                        <div>
                            <label for="register-name" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Full Name</label>
                            <input type="text" id="register-name" name="name" value="{{ old('name') }}" required placeholder="John Doe" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="register-email" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Email</label>
                            <input type="email" id="register-email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="register-password" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Password</label>
                            <input type="password" id="register-password" name="password" required placeholder="........" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="register-password-confirm" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Confirm Password</label>
                            <input type="password" id="register-password-confirm" name="password_confirmation" required placeholder="........" class="w-full border border-gray-200 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent placeholder-gray-400">
                        </div>

                        <button type="submit" class="w-full bg-gray-900 text-white font-bold py-3 rounded-md hover:bg-gray-800 transition-colors mt-2">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full bg-white border-t border-gray-200 py-8 mt-auto" style="margin-top: 200px;">
            <p class="text-[10px] text-gray-400 text-center">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const loginTab = document.getElementById('login-tab');
                const registerTab = document.getElementById('register-tab');
                const loginForm = document.getElementById('login-form');
                const registerForm = document.getElementById('register-form');

                loginTab.addEventListener('click', function() {
                    // Update tabs
                    loginTab.classList.add('bg-white', 'shadow-sm', 'text-gray-900');
                    loginTab.classList.remove('text-gray-500');
                    registerTab.classList.remove('bg-white', 'shadow-sm', 'text-gray-900');
                    registerTab.classList.add('text-gray-500');
                    
                    // Show/hide forms
                    loginForm.classList.remove('hidden');
                    registerForm.classList.add('hidden');
                });

                registerTab.addEventListener('click', function() {
                    // Update tabs
                    registerTab.classList.add('bg-white', 'shadow-sm', 'text-gray-900');
                    registerTab.classList.remove('text-gray-500');
                    loginTab.classList.remove('bg-white', 'shadow-sm', 'text-gray-900');
                    loginTab.classList.add('text-gray-500');
                    
                    // Show/hide forms
                    registerForm.classList.remove('hidden');
                    loginForm.classList.add('hidden');
                });
            });
        </script>
    </body>
</html>
