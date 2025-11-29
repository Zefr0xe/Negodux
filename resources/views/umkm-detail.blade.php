<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $umkm['name'] }} - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white">
        <!-- Navbar (Matched to Welcome Blade) -->
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

        <main class="max-w-7xl mx-auto px-8 pt-32 pb-8">
            <!-- Breadcrumb / Back -->
            <div class="mb-6">
                <a href="/umkm" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    Back to UMKM List
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left Column (Main Content) -->
                <div class="lg:col-span-8">
                    
                    <!-- Image (Top of Left Column) -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden mb-6 border border-gray-200">
                        <div class="aspect-video w-full relative">
                            <img src="{{ $umkm['image'] }}" alt="{{ $umkm['name'] }}" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Title & Category (Below Image) -->
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-tight">{{ $umkm['name'] }}</h1>
                            <p class="text-gray-500 text-sm">{{ $umkm['description'] }}</p>
                        </div>
                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs font-bold uppercase tracking-wide">{{ $umkm['category'] }}</span>
                    </div>

                    <!-- Business Information -->
                    <div class="mb-10 mt-8">
                        <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            Business Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                            <!-- Owner -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    Owner
                                </span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['owner'] }}</span>
                            </div>
                            <!-- Location -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    Location
                                </span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['location'] }}</span>
                            </div>
                            <!-- Email -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    Email
                                </span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['email'] }}</span>
                            </div>
                            <!-- Phone -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                    Phone
                                </span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['phone'] }}</span>
                            </div>
                            <!-- Established -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1">Established</span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['established'] }}</span>
                            </div>
                            <!-- Employees -->
                            <div class="flex flex-col">
                                <span class="text-gray-400 text-xs mb-1">Employees</span>
                                <span class="font-medium text-gray-900 text-sm">{{ $umkm['employees'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Advisory Terms -->
                    <div class="mt-10">
                        <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Advisory Terms & Stake Conditions
                        </h2>
                        <div class="space-y-3">
                            @foreach($umkm['milestones'] as $milestone)
                            <div class="flex items-start gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-green-600 mt-1">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <span class="text-gray-700 text-sm">{{ $milestone }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sticky Sidebar - Simple Card) -->
                <div class="lg:col-span-4">
                    <div class="sticky top-8">
                        <div class="border border-gray-200 rounded-lg bg-white shadow-sm p-6">
                            <h3 class="text-xl font-bold mb-6 text-gray-900">Mentorship Needs</h3>
                            
                            <div class="mb-6">
                                <p class="text-xs text-gray-500 mb-2">Required Expertise:</p>
                                <p class="text-sm font-medium text-gray-900 leading-relaxed">{{ $umkm['needs'] }}</p>
                            </div>
                            
                            <div class="mb-8">
                                <p class="text-xs text-gray-500 mb-1">Reward Offered:</p>
                                <div class="flex items-baseline gap-2">
                                    <p class="text-4xl font-bold text-gray-900">{{ $umkm['reward'] }}</p>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-1">equity stake upon completion of terms</p>
                            </div>
                            
                            <button class="w-full bg-gray-900 text-white py-3 rounded-md text-sm font-bold hover:bg-gray-800 transition-colors">
                                Apply as Mentor
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center border-t border-gray-100 mt-12">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>
    </body>
</html>
