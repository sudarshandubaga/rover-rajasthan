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

                {{-- Trust Badges --}}
                <div class="mt-8 flex flex-wrap gap-3">
                    <div
                        class="flex items-center gap-2 px-4 py-1.5 bg-white/5 rounded-lg border border-white/10 transition hover:bg-white/10">
                        <i class="bi bi-clock-history text-roberto-teal"></i>
                        <span class="text-[11px] font-bold uppercase tracking-wider">24/7 Availability</span>
                    </div>
                    <div
                        class="flex items-center gap-2 px-4 py-1.5 bg-white/5 rounded-lg border border-white/10 transition hover:bg-white/10">
                        <i class="bi bi-patch-check-fill text-roberto-teal"></i>
                        <span class="text-[11px] font-bold uppercase tracking-wider">ISO 9001:2015</span>
                    </div>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Quick Links</h4>

                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="{{ route('page.show', 'about-us') }}" class="hover:text-orange-600 transition">About
                            Us</a></li>
                    <li class="mt-3">
                        <a href="{{ route('page.show', 'customized-tour') }}"
                            class="hover:text-orange-600 transition">Customize Tour</a>
                    </li>
                    <li class="mt-3">
                        <a href="{{ route('page.show', 'blog') }}" class="hover:text-orange-600 transition">Blog</a>
                    </li>
                    <li class="mt-3">
                        <a href="{{ route('page.show', 'contact-us') }}"
                            class="hover:text-orange-600 transition">Contact
                            Us</a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Day Tours --}}
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Sightseeing Tours</h4>
                <ul class="space-y-2 text-sm text-white/70">
                    @foreach ($sightseeingPackages as $pkgSlug => $pkgName)
                        <li>
                            <a href="{{ route('tour.show', $pkgSlug) }}"
                                class="hover:text-orange-600 transition">{{ $pkgName }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3: Day Tours --}}
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-sky-400/50 pb-2">Day Tours</h4>
                <ul class="space-y-2 text-sm text-white/70">
                    @foreach ($dayPackages as $pkgSlug => $pkgName)
                        <li>
                            <a href="{{ route('tour.show', $pkgSlug) }}"
                                class="hover:text-orange-600 transition">{{ $pkgName }}</a>
                        </li>
                    @endforeach
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