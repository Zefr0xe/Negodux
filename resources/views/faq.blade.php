<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAQ - Negodux</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .accordion-content {
                transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
                max-height: 0;
                opacity: 0;
                overflow: hidden;
            }
            .accordion-content.active {
                opacity: 1;
            }
            .accordion-icon {
                transition: transform 0.3s ease;
            }
            .accordion-icon.rotate {
                transform: rotate(180deg);
            }
        </style>
    </head>
    <body class="antialiased font-sans text-gray-900 bg-gray-50">
        <!-- Navbar -->
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

        <main class="max-w-4xl mx-auto px-8 pt-32 pb-16">
            <!-- Header -->
            <div class="text-left mb-8">
                <h1 class="text-2xl font-bold mb-2 flex items-center gap-2 text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                    </svg>
                    Frequently Asked Questions
                </h1>
                <p class="text-gray-500 text-sm">Find answers to common questions about Negodux and how our platform works.</p>
            </div>

            <!-- Accordion -->
            <div class="bg-white rounded-lg border border-gray-200">
                <!-- Item 1 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">What is Negodux?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Negodux is a platform that connects growing UMKM (MSME) businesses with experienced professionals. Mentors provide expertise in exchange for equity stakes, helping businesses scale while offering mentors meaningful investment opportunities.
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">How does the equity reward system work?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Businesses offer a percentage of equity (typically 10-25%) as compensation for mentorship. The specific terms, milestones, and vesting periods are agreed upon in a contract between the business owner and the mentor before the partnership begins.
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">Who can become a mentor?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Professionals with proven expertise in areas such as marketing, finance, operations, supply chain, or technology can apply. We verify all mentors to ensure they have the experience necessary to guide businesses effectively.
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">How do I apply to help a UMKM business?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Browse the UMKM list, view the details of a business that matches your expertise, and click the "Apply as Mentor" button. You'll be asked to submit a brief proposal outlining how you can help meet their specific needs.
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">What types of businesses are on the platform?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            We host a diverse range of Indonesian UMKMs, including Food & Beverage, Fashion, Crafts, Manufacturing, Beauty, and Technology startups. All businesses are vetted to ensure they are legitimate and ready for mentorship.
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">How do I contact a mentor?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            If you are a business owner, you can list your business and wait for mentors to apply. Alternatively, you can browse our directory of verified mentors (coming soon) and invite them to view your business profile.
                        </div>
                    </div>
                </div>

                <!-- Item 7 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">Is there a fee to use the platform?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Registration is free for both businesses and mentors. We charge a small success fee only when a partnership agreement is successfully finalized.
                        </div>
                    </div>
                </div>

                <!-- Item 8 -->
                <div class="border-b border-gray-200 last:border-b-0">
                    <button class="accordion-btn w-full flex justify-between items-center px-6 py-6 text-left focus:outline-none group">
                        <span class="text-sm font-medium text-gray-900">What kind of support do UMKM businesses need?</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 accordion-icon">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-sm text-gray-600 leading-relaxed">
                            Needs vary widely but often include digital marketing strategy, financial planning, operational efficiency, export documentation, product development, and branding.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Support Box -->
            <div class="mt-16 bg-white border border-gray-200 rounded-lg p-8 text-center">
                <h3 class="font-bold text-gray-900 mb-2">Still have questions?</h3>
                <p class="text-xs text-gray-500 mb-6">Can't find the answer you're looking for? Feel free to reach out to our support team.</p>
                <button class="bg-gray-900 text-white px-6 py-2.5 rounded text-sm font-bold hover:bg-gray-800 transition-colors">
                    Contact Support
                </button>
            </div>
        </main>

        <!-- Footer -->
        <footer class="max-w-7xl mx-auto px-8 py-8 text-center border-t border-gray-100 mt-auto">
            <p class="text-[10px] text-gray-400">
                &copy; 2025 Negodux. All rights reserved.
            </p>
        </footer>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const accordions = document.querySelectorAll('.accordion-btn');

                accordions.forEach(acc => {
                    acc.addEventListener('click', function() {
                        const content = this.nextElementSibling;
                        const icon = this.querySelector('.accordion-icon');

                        // Toggle current
                        if (content.style.maxHeight) {
                            content.style.maxHeight = null;
                            content.classList.remove('active');
                            icon.classList.remove('rotate');
                        } else {
                            // Close others (optional, but good for clean UI)
                            accordions.forEach(otherAcc => {
                                const otherContent = otherAcc.nextElementSibling;
                                const otherIcon = otherAcc.querySelector('.accordion-icon');
                                if (otherContent !== content && otherContent.style.maxHeight) {
                                    otherContent.style.maxHeight = null;
                                    otherContent.classList.remove('active');
                                    otherIcon.classList.remove('rotate');
                                }
                            });

                            content.style.maxHeight = content.scrollHeight + "px";
                            content.classList.add('active');
                            icon.classList.add('rotate');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
</html>
