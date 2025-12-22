<!-- Header & Navigation (Updated Branding) -->
<header class="sticky top-0 z-50 bg-roberto-dark shadow-lg">
    <!-- Top Trust Bar -->
    <div class="bg-black/10 border-b border-white/5 py-1 hidden md:block">
        <div class="container mx-auto flex justify-end items-center gap-6 text-[10px] uppercase tracking-widest text-white/60 font-bold">
            <div class="flex items-center gap-2">
                <i class="bi bi-clock-history text-roberto-teal text-sm"></i>
                <span>24/7 Availability</span>
            </div>
            <div class="flex items-center gap-2 border-l border-white/10 pl-6">
                <i class="bi bi-patch-check-fill text-roberto-teal text-sm"></i>
                <span>ISO 9001:2015 Certified</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex items-center justify-between py-2 lg:py-0">
        <x-logo />

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex space-x-5 text-lg font-medium text-white/80 relative">
            <a href="{{ route('page.show', 'about-us') }}" class="hover:text-roberto-teal transition duration-200">About
                Us</a>
            <!-- Day Tours Dropdown -->
            <div class="group relative">
                <button class="hover:text-roberto-teal transition duration-200 flex items-center gap-1">
                    Cab Services
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute left-0 hidden group-hover:block bg-roberto-dark/95 backdrop-blur-sm shadow-lg rounded-md  min-w-[250px] text-nowrap">
                    @foreach ($cabServices as $slug => $title)
                        <a href="{{ route('cab-service.show', $slug) }}"
                            class="block px-5 py-2 hover:bg-roberto-teal/20">{{ $title }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Sightseeing Tours Dropdown -->
            <div class="group relative">
                <button class="hover:text-roberto-teal transition duration-200 flex items-center gap-1">
                    Sightseeing Tours
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute left-0 hidden group-hover:block bg-roberto-dark/95 backdrop-blur-sm shadow-lg rounded-md min-w-[220px]">
                    @foreach ($sightseeingPackages as $pkgSlug => $pkgName)
                        <a href="{{ route('tour.show', $pkgSlug) }}"
                            class="block px-5 py-2 hover:bg-roberto-teal/20">{{ $pkgName }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('page.show', ['customized-tour']) }}"
                class="hover:text-roberto-teal transition duration-200">Customize Tour</a>

            <!-- Day Tours Dropdown -->
            <div class="group relative">
                <button class="hover:text-roberto-teal transition duration-200 flex items-center gap-1">
                    Day Tours
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div
                    class="absolute left-0 hidden group-hover:block bg-roberto-dark/95 backdrop-blur-sm shadow-lg rounded-md  min-w-[250px] text-nowrap">
                    @foreach ($dayPackages as $pkgSlug => $pkgName)
                        <a href="{{ route('tour.show', $pkgSlug) }}"
                            class="block px-5 py-2 hover:bg-roberto-teal/20">{{ $pkgName }}</a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('page.show', 'contact-us') }}"
                class="hover:text-roberto-teal transition duration-200">Contact Us</a>
        </nav>

        <!-- Book Button -->
        <a href="{{ route('page.show', 'contact-us') }}"
            class="hidden lg:block bg-amber-600 text-white font-bold py-2 px-6 rounded-md hover:bg-orange-400 transition duration-200">
            BOOK A RIDE
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-toggle" class="lg:hidden text-white">
            <i class="w-6 h-6">
                <i class="bi bi-list text-4xl"></i>
            </i>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden bg-roberto-dark text-white/90">

        <a href="{{ route('home') }}" class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">
            Home
        </a>

        <a href="{{ route('page.show', 'about-us') }}"
            class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">
            About Us
        </a>

        <!-- Cab Services -->
        <details class="border-t border-white/10">
            <summary class="px-6 py-3 cursor-pointer hover:bg-roberto-teal/20">Cab Services</summary>
            <div class="bg-roberto-dark/90">
                @foreach ($cabServices as $slug => $title)
                    <a href="{{ route('cab-service.show', $slug) }}" class="block px-8 py-2 hover:bg-roberto-teal/20">
                        {{ $title }}
                    </a>
                @endforeach
            </div>
        </details>

        <!-- Sightseeing Tours -->
        <details class="border-t border-white/10">
            <summary class="px-6 py-3 cursor-pointer hover:bg-roberto-teal/20">Sightseeing Tours</summary>
            <div class="bg-roberto-dark/90">
                @foreach ($sightseeingPackages as $pkgSlug => $pkgName)
                    <a href="{{ route('tour.show', $pkgSlug) }}" class="block px-8 py-2 hover:bg-roberto-teal/20">
                        {{ $pkgName }}
                    </a>
                @endforeach
            </div>
        </details>

        <a href="{{ route('page.show', 'customized-tour') }}"
            class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">
            Customize Tour
        </a>

        <!-- Day Tours -->
        <details class="border-t border-white/10">
            <summary class="px-6 py-3 cursor-pointer hover:bg-roberto-teal/20">Day Tours</summary>
            <div class="bg-roberto-dark/90">
                @foreach ($dayPackages as $pkgSlug => $pkgName)
                    <a href="{{ route('tour.show', $pkgSlug) }}" class="block px-8 py-2 hover:bg-roberto-teal/20">
                        {{ $pkgName }}
                    </a>
                @endforeach
            </div>
        </details>

        <a href="{{ route('page.show', 'contact-us') }}"
            class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">
            Contact Us
        </a>

        <!-- Trust Markers in Mobile Menu -->
        <div class="border-t border-white/10 px-6 py-4 bg-black/10">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-3 text-sm text-white/70">
                    <i class="bi bi-clock-history text-roberto-teal"></i>
                    <span>24/7 Availability</span>
                </div>
                <div class="flex items-center gap-3 text-sm text-white/70">
                    <i class="bi bi-patch-check-fill text-roberto-teal"></i>
                    <span>ISO 9001:2015 Certified</span>
                </div>
            </div>
        </div>
    </div>

</header>
