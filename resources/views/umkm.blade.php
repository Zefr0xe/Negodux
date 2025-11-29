<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>UMKM Businesses - Negodux</title>
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

        <main class="max-w-7xl mx-auto px-8 pt-32 pb-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg>
                    UMKM Businesses
                </h1>
                <button class="bg-gray-900 text-white px-4 py-2 rounded text-xs font-bold flex items-center gap-2 hover:bg-gray-800">
                    <span>+</span> Register UMKM
                </button>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                    <input type="text" id="searchInput" placeholder="Search by business name..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400">
                </div>
                <div>
                    <select id="sortSelect" class="w-full px-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                        <option value="default">Default</option>
                        <option value="high-low">Stake: Highest to Lowest</option>
                        <option value="low-high">Stake: Lowest to Highest</option>
                    </select>
                </div>
                <div>
                    <select id="categorySelect" class="w-full px-4 py-2 border border-gray-200 rounded text-sm focus:outline-none focus:border-gray-400 bg-white">
                        <option value="all">All Categories</option>
                        <option value="F&B">F&B</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Beauty">Beauty</option>
                    </select>
                </div>
            </div>

            <!-- Grid -->
            <div id="umkmGrid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="F&B" data-stake="15" data-name="Kopi Lestari">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                        <!-- Placeholder Image -->
                        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Kopi Lestari" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Kopi Lestari</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">F&B</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Traditional coffee shop looking to expand distribution network</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">Supply chain optimization and distribution strategy</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">15% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/1" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="Fashion" data-stake="20" data-name="Batik Nusantara">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                         <img src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Batik Nusantara" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Batik Nusantara</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">Fashion</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Handmade batik producer seeking digital transformation</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">E-commerce platform and digital marketing</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">20% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/2" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="Manufacturing" data-stake="12" data-name="Furniture Jati">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                        <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Furniture Jati" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Furniture Jati</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">Manufacturing</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Wooden furniture manufacturer needs export guidance</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">Export documentation and international marketing</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">12% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/3" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="F&B" data-stake="18" data-name="Keripik Pedas">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                        <img src="https://images.unsplash.com/photo-1599490659213-e2b9527bd087?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Keripik Pedas" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Keripik Pedas</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">F&B</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Spicy chips producer seeking packaging redesign</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">Branding and packaging design</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">18% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/4" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>

                 <!-- Card 5 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="Beauty" data-stake="25" data-name="Sabun Organik">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                        <img src="https://images.unsplash.com/photo-1601612628452-9e99ced43524?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Sabun Organik" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Sabun Organik</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">Beauty</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Organic soap maker looking for retail partnerships</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">Retail strategy and partnership development</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">25% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/5" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>

                 <!-- Card 6 -->
                <div class="umkm-card border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow" data-category="Fashion" data-stake="16" data-name="Tas Kulit">
                    <div class="h-48 bg-gray-200 w-full object-cover">
                        <img src="https://images.unsplash.com/photo-1590874102752-cee723b74982?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tas Kulit" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-bold text-base">Tas Kulit</h3>
                            <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-1 rounded-full font-bold">Fashion</span>
                        </div>
                        <p class="text-xs text-gray-500 mb-4 line-clamp-2">Leather bag craftsman needs quality control system</p>
                        
                        <div class="mb-3">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Needs:</p>
                            <p class="text-xs text-gray-700">Quality management and production efficiency</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-[10px] text-gray-400 font-bold uppercase mb-1">Reward:</p>
                            <p class="text-xl font-bold text-gray-900">16% <span class="text-[10px] text-gray-500 font-normal">equity stake</span></p>
                        </div>
                        
                        <a href="/umkm/6" class="w-full bg-gray-900 text-white py-2 rounded text-xs font-bold hover:bg-gray-800 block text-center">View Details</a>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const sortSelect = document.getElementById('sortSelect');
                const categorySelect = document.getElementById('categorySelect');
                const grid = document.getElementById('umkmGrid');
                const cards = Array.from(document.querySelectorAll('.umkm-card'));

                function filterAndSort() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const selectedCategory = categorySelect.value;
                    const sortValue = sortSelect.value;

                    // Filter
                    const filteredCards = cards.filter(card => {
                        const name = card.dataset.name.toLowerCase();
                        const category = card.dataset.category;
                        
                        const matchesSearch = name.includes(searchTerm);
                        const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

                        if (matchesSearch && matchesCategory) {
                            card.style.display = 'block';
                            return true;
                        } else {
                            card.style.display = 'none';
                            return false;
                        }
                    });

                    // Sort
                    const visibleCards = filteredCards; // Only sort visible cards
                    
                    if (sortValue !== 'default') {
                        visibleCards.sort((a, b) => {
                            const stakeA = parseFloat(a.dataset.stake);
                            const stakeB = parseFloat(b.dataset.stake);
                            
                            if (sortValue === 'high-low') {
                                return stakeB - stakeA;
                            } else {
                                return stakeA - stakeB;
                            }
                        });
                    }

                    // Re-append sorted cards
                    visibleCards.forEach(card => grid.appendChild(card));
                }

                searchInput.addEventListener('input', filterAndSort);
                sortSelect.addEventListener('change', filterAndSort);
                categorySelect.addEventListener('change', filterAndSort);
            });
        </script>
    </body>
</html>
