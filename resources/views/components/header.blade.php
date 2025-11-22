<!-- Header & Navigation (Updated Branding) -->
<header class="sticky top-0 z-50 bg-roberto-dark shadow-lg">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-white uppercase tracking-wider logo">
            <img src="{{ $site->logo }}" alt="{{ $site->title }}" class="h-14" loading="lazy">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex space-x-5 text-lg font-medium text-white/80 relative">
            {{-- <a href="#home" class="hover:text-roberto-teal transition duration-200">Home</a> --}}
            <a href="{{ route('page.show', 'about-us') }}" class="hover:text-roberto-teal transition duration-200">About
                Us</a>
            {{-- <a href="{{ route('page.show', 'cab-services') }}"
                class="hover:text-roberto-teal transition duration-200">Cab Services</a> --}}

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
            <i class="w-6 h-6">Menu</i>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden bg-roberto-dark text-white/90">
        <a href="#home" class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">Home</a>
        <a href="#about" class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">About Us</a>
        <a href="#cab-services" class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">Cab
            Services</a>

        <!-- Mobile Dropdowns -->
        <details class="border-t border-white/10">
            <summary class="px-6 py-3 cursor-pointer hover:bg-roberto-teal/20">Sightseeing Tours</summary>
            <div class="bg-roberto-dark/90">
                <a href="#jaipur" class="block px-8 py-2 hover:bg-roberto-teal/20">Jaipur Sightseeing</a>
                <a href="#udaipur" class="block px-8 py-2 hover:bg-roberto-teal/20">Udaipur Sightseeing</a>
                <a href="#bikaner" class="block px-8 py-2 hover:bg-roberto-teal/20">Bikaner Sightseeing</a>
                <a href="#agra" class="block px-8 py-2 hover:bg-roberto-teal/20">Agra Sightseeing</a>
                <a href="#delhi" class="block px-8 py-2 hover:bg-roberto-teal/20">Delhi Sightseeing</a>
            </div>
        </details>

        <a href="{{ route('page.show', 'customized-tour') }}"
            class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">Customize
            Tour</a>

        <details class="border-t border-white/10">
            <summary class="px-6 py-3 cursor-pointer hover:bg-roberto-teal/20">Day Tours</summary>
            <div class="bg-roberto-dark/90">
                <a href="#halfday" class="block px-8 py-2 hover:bg-roberto-teal/20">Jodhpur Sightseeing Half Day
                    Tour</a>
                <a href="#fullday" class="block px-8 py-2 hover:bg-roberto-teal/20">Jodhpur Sightseeing Full Day
                    Tour</a>
                <a href="#2days" class="block px-8 py-2 hover:bg-roberto-teal/20">Jodhpur Sightseeing 2 Days
                    Tour</a>
            </div>
        </details>

        <a href="#contact" class="block px-6 py-3 border-t border-white/10 hover:bg-roberto-teal/20">Contact
            Us</a>
    </div>
</header>
