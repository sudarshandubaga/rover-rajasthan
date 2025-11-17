<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page->seo_title ?: $site->title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <meta name="keywords" content="{{ $page->seo_keywords }}">
    <meta name="description" content="{{ $page->seo_description }}">
    <meta name="author" content="{{ $site->title }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph for Social Media -->
    <meta property="og:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta property="og:description" content="{{ $page->seo_description }}">
    <meta property="og:image" content="{{ $page->image }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Twitter Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta name="twitter:description" content="{{ $page->seo_description }}">
    <meta name="twitter:image" content="{{ $page->image }}">

    <!-- Canonical URL to Avoid Duplicate Content Issues -->
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ $site->favicon }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-700 antialiased">
    <x-header />


    <main>
        @yield('main_content')
    </main>

    <!-- Main Footer (Updated for Indian Focus) -->
    <footer class="bg-[#122B47] text-white/90 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-10 border-b border-white/10 pb-10 mb-8">

                {{-- Column 1: Logo & About --}}
                <div class="col-span-2">
                    <a href="/" class="text-3xl font-extrabold text-white uppercase tracking-wide mb-4 block">
                        {{ $site->title }}
                    </a>
                    <p class="text-sm text-white/70 leading-relaxed">
                        Connecting the major cities of India with reliable, comfortable, and safe private car services.
                    </p>

                    <div class="mt-5 space-y-2 text-sm text-white/70">
                        <p>
                            <i class="bi bi-geo-alt inline-block w-4 h-4 mr-2 text-orange-600"></i>
                            {{ $site->address }}
                        </p>
                        <p>
                            <i class="bi bi-phone inline-block w-4 h-4 mr-2 text-orange-600"></i>
                            {{ $site->phone }}
                        </p>
                        <p>
                            <i class="bi bi-envelope inline-block w-4 h-4 mr-2 text-orange-600"></i>
                            {{ $site->email }}
                        </p>
                    </div>
                </div>

                {{-- Column 2: Quick Links --}}
                <div>
                    <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Quick Links</h4>

                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="/about-us" class="hover:text-orange-600 transition">About Us</a></li>
                        <li><a href="/cab-services" class="hover:text-orange-600 transition">Cab Services</a></li>
                        <li class="mt-3">
                            <a href="/#customize" class="hover:text-orange-600 transition">Customize Tour</a>
                        </li>
                        <li class="mt-3">
                            <a href="/#customize" class="hover:text-orange-600 transition">Blog</a>
                        </li>
                        <li class="mt-3">
                            <a href="/contact-us" class="hover:text-orange-600 transition">Contact Us</a>
                        </li>
                    </ul>
                </div>

                {{-- Column 3: Day Tours --}}
                <div>
                    <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Sightseeing Tours</h4>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="/sightseeing-tours#jaipur" class="hover:text-orange-600 transition">Jaipur
                                Sightseeing</a></li>
                        <li><a href="/sightseeing-tours#udaipur" class="hover:text-orange-600 transition">Udaipur
                                Sightseeing</a></li>
                        <li><a href="/sightseeing-tours#bikaner" class="hover:text-orange-600 transition">Bikaner
                                Sightseeing</a></li>
                        <li><a href="/sightseeing-tours#agra" class="hover:text-orange-600 transition">Agra
                                Sightseeing</a></li>
                        <li><a href="/sightseeing-tours#delhi" class="hover:text-orange-600 transition">Delhi
                                Sightseeing</a></li>
                    </ul>
                </div>

                {{-- Column 3: Day Tours --}}
                <div>
                    <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Day Tours</h4>
                    <ul class="space-y-2 text-sm text-white/70">
                        <li><a href="/day-tours#halfday" class="hover:text-orange-600 transition">Jodhpur Half Day
                                Tour</a></li>
                        <li><a href="/day-tours#fullday" class="hover:text-orange-600 transition">Jodhpur Full Day
                                Tour</a></li>
                        <li><a href="/day-tours#2days" class="hover:text-orange-600 transition">Jodhpur 2 Days
                                Tour</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Footer Bottom --}}
            <div class="flex flex-col sm:flex-row items-center justify-between text-sm text-white/70">
                <p>&copy; {{ date('Y') }} &mdash; {{ $site->title }}. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-orange-600 transition">
                        <i class="bi bi-facebook w-5 h-5"></i>
                    </a>
                    <a href="#" class="hover:text-orange-600 transition">
                        <i class="bi bi-instagram w-5 h-5"></i>
                    </a>
                    <a href="#" class="hover:text-orange-600 transition">
                        <i class="bi bi-twitter-x w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-toggle').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @vite('resources/js/app.js')
</body>

</html>
