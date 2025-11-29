<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white">
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
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50 flex items-center gap-2">
                                {{ Auth::user()->name }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-bold uppercase tracking-wide hover:bg-gray-50 rounded-lg">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="text-xs font-bold uppercase tracking-wide border border-gray-200 rounded px-4 py-2 hover:bg-gray-50">Login / Register</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="max-w-4xl mx-auto px-8 pt-32 pb-24 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight text-gray-900 leading-tight">
                Empowering Indonesian SMEs Through Expert Mentorship
            </h1>
            <p class="text-gray-500 text-base mb-10 max-w-2xl mx-auto leading-relaxed">
                Negodux bridges the gap between growing businesses and experienced professionals.<br>
                Help local enterprises thrive while earning equity stakes in promising ventures.
            </p>
            <div class="flex justify-center gap-4">
                <a href="/umkm" class="bg-gray-900 text-white px-6 py-2.5 rounded text-sm font-bold hover:bg-gray-800 transition-colors">Explore UMKM</a>
                <button class="bg-white text-gray-900 border border-gray-200 px-6 py-2.5 rounded text-sm font-bold hover:bg-gray-50 transition-colors">Find Mentors</button>
            </div>
        </main>

        <!-- Features Section -->
        <section class="max-w-6xl mx-auto px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Targeted Matching -->
                <div class="flex flex-col items-center">
                    <div class="mb-6">
                         <!-- Icon: Target -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-800">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold mb-2">Targeted Matching</h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-xs mx-auto">
                        Connect with businesses that need your specific expertise, from supply chain to digital marketing.
                    </p>
                </div>
                <!-- Equity-Based Rewards -->
                <div class="flex flex-col items-center">
                    <div class="mb-6">
                        <!-- Icon: Handshake -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-800">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 1 0-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 0 1 3.15 0v1.5m-3.15 0 .075 5.951a.983.983 0 0 1-.821 1.085l-1.337.267a1.912 1.912 0 0 0-1.226 1.183l-.313.939a.966.966 0 0 0 .923 1.275h1.078m1.971-8.96c.712 0 1.316.463 1.516 1.103l.313.939a.966.966 0 0 1-.923 1.275h-1.078a.966.966 0 0 1-.923-1.275l.313-.939a1.912 1.912 0 0 0-1.226-1.183l-1.337-.267a.983.983 0 0 1-.821-1.085l.075-5.951m8.892 8.183a1.575 1.575 0 1 0-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 0 1 3.15 0v1.5m-3.15 0 .075 5.951a.983.983 0 0 1-.821 1.085l-1.337.267a1.912 1.912 0 0 0-1.226 1.183l-.313.939a.966.966 0 0 0 .923 1.275h1.078" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold mb-2">Equity-Based Rewards</h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-xs mx-auto">
                        Earn meaningful equity stakes (10-25%) in businesses you help grow and scale.
                    </p>
                </div>
                <!-- Growth Opportunities -->
                <div class="flex flex-col items-center">
                    <div class="mb-6">
                        <!-- Icon: Growth -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-800">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.307a11.95 11.95 0 0 1 5.814-5.519l2.74-1.22m0 0-5.94-2.28m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold mb-2">Growth Opportunities</h3>
                    <p class="text-xs text-gray-500 leading-relaxed max-w-xs mx-auto">
                        Work with diverse UMKM sectors including F&B, fashion, manufacturing, and beauty products.
                    </p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="max-w-5xl mx-auto px-8 py-16 mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- For Mentors -->
                <div class="border border-gray-200 rounded-lg p-8 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="mb-4">
                         <!-- Icon: Document/List -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-800">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">For Mentors</h3>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Browse businesses seeking mentorship and support. Apply your expertise to help them overcome challenges and achieve their growth goals.
                    </p>
                    <a href="#" class="text-xs font-bold flex items-center gap-1 hover:gap-2 transition-all text-gray-900">
                        View UMKM Businesses <span>&rarr;</span>
                    </a>
                </div>
                <!-- For UMKM Businesses -->
                <div class="border border-gray-200 rounded-lg p-8 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="mb-4">
                        <!-- Icon: User -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-800">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2">For UMKM Businesses</h3>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                        Connect with experienced mentors who specialize in various business domains. Get the strategic guidance you need to scale your business.
                    </p>
                    <a href="#" class="text-xs font-bold flex items-center gap-1 hover:gap-2 transition-all text-gray-900">
                        Find Professional Mentors <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>
    </body>
</html>
