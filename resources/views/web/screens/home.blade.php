@extends('web.layouts.default')

@section('main_content')
    {{-- Banner Slider Section Start --}}
    <section>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slide)
                    <div class="swiper-slide">
                        <img src="{{ $slide->image }}" alt="{{ $slide->title }}" loading="lazy"
                            class="aspect-[3/1] object-cover w-full">
                    </div>
                @endforeach
            </div>
            <button
                class="swiper-button-next !block rounded-full bg-roberto-dark/60 hover:bg-roberto-dark text-white !h-auto py-2 !w-16 aspect-square"></button>
            <button
                class="swiper-button-prev !block rounded-full bg-roberto-dark/60 hover:bg-roberto-dark !text-white !h-auto py-2 !w-16 aspect-square"></button>
            <div class="swiper-pagination !block"></div>
        </div>
    </section>
    {{-- Banner Slider Section End --}}

    <!-- Booking Form Section (Updated Form Fields for City Travel) -->
    {{-- <section id="booking-form" class="relative -mt-16 lg:-mt-24 z-20 container mx-auto px-4">
        <div class="bg-white rounded-xl shadow-2xl p-6 lg:p-8">
            <div class="flex gap-4 mb-4">
                <button class="trip-tab bg-roberto-teal text-white px-4 py-2 rounded-lg border shadow"
                    data-trip="local">Local Trip</button>
                <button class="trip-tab bg-white text-gray-600 px-4 py-2 rounded-lg border shadow" data-trip="oneway">One
                    Way Trip</button>
                <button class="trip-tab bg-white text-gray-600 px-4 py-2 rounded-lg border shadow" data-trip="round">Round
                    Trip</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                <!-- Dropdowns (Modified for Source/Destination City) -->
                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500" for="source_city">Source City</label>
                    <x-select-dropdown id="source_city" required>
                        <option value="">--select--</option>
                        @foreach ($cities as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </x-select-dropdown>
                </div>
                <!-- Destination City -->
                <div class="space-y-1" id="destination-wrapper">
                    <label class="block text-xs font-semibold uppercase text-gray-500" for="destination_city">
                        Destination City
                    </label>
                    <x-select-dropdown id="destination_city" required>
                        <option value="">--select--</option>
                        @foreach ($cities as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </x-select-dropdown>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Travel Date</label>
                    <input type="date" value="2026-06-15"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-roberto-teal focus:border-roberto-teal" />
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500" for="contact_no">Contact No.</label>
                    <input type="tel" value="" id="contact_no" placeholder="Contact No."
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-roberto-teal focus:border-roberto-teal" />
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold uppercase text-gray-500">Vehicle Type</label>
                    <x-select-dropdown>
                        <option value="">--select--</option>
                        @foreach ($cabs as $cab)
                            <option value="{{ $cab->id }}">{{ $cab->vehicle_type }} ({{ $cab->capacity }} Seater)
                            </option>
                        @endforeach
                    </x-select-dropdown>
                </div>

                <!-- Search Button -->
                <button
                    class="lg:col-span-1 mt-6 lg:mt-0 bg-roberto-teal text-white font-bold text-lg rounded-lg py-3 px-6 hover:bg-teal-400 transition duration-300 shadow-md">
                    FIND TRANSFERS
                </button>
            </div>
        </div>
    </section> --}}

    <x-booking-form />

    <!-- About Section -->
    <section id="about" class="container mx-auto px-4 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Text Content & Service Icons -->
            <div>
                <span class="text-xs font-bold uppercase text-orange-600 tracking-widest">ABOUT US</span>
                <h2 class="4xl font-bold text-roberto-dark mt-2 mb-6">Your Reliable Partner for <span class="fw-bold">Indian
                        Inter-City Travel</span></h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    {!! $about->description !!}
                </p>

                <!-- Service Icons (Updated for City-to-City Travel) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center mt-10">
                    <div class="space-y-2">
                        <i class="bi bi-car-front text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Verified Fleet</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-shield-check text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Safety Assured</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-clock text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Punctual Service</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-map text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Pan-India Routes</p>
                    </div>
                </div>

            </div>

            <!-- Image Grid (Updated with real-looking images) -->
            <div>
                <img src="{{ $about->image }}" alt="">
            </div>
        </div>
    </section>

    <!-- Tour Package Showcase Section -->
    <section id="tours" class="bg-gray-100 py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase text-roberto-teal tracking-widest">TAXI</span>
                <h2 class="text-4xl font-bold text-roberto-dark mt-2">Vehicles We Offer</h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($cabs as $cab)
                    <div class="bg-white p-5 rounded-lg">
                        <div class="image">
                            <img src="{{ $cab->image }}" alt="{{ $cab->vehicle_type }}" class="w-full aspect-video">
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <div>
                                <h4 class="text-orange-500 font-bold text-lg">{{ $cab->vehicle_type }}</h4>

                                <div class="text-gray-400">
                                    {{ $cab->capacity }} Seater
                                </div>
                            </div>
                            <div class="font-bold text-3xl">
                                ₹{{ $cab->fare }} / km
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Guest Testimonial Section (Converted to Swiper Slider) -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase text-roberto-teal tracking-widest">REVIEWS</span>
                <h2 class="text-4xl font-bold text-roberto-dark mt-2">Connecting India, One City at a Time</h2>
            </div>

            <!-- Swiper Container for Testimonials -->
            <div class="swiper testimonials-swiper max-w-3xl mx-auto">
                <div class="swiper-wrapper">
                    <!-- Swiper Slide 1 -->
                    <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row items-center sm:items-start space-y-6 sm:space-y-0 sm:space-x-8">
                            <img src="{{ asset('images/Testimonial3.png') }}" alt="Reviewer Rahul Sharma"
                                class="w-24 h-24 rounded-full object-cover ring-4 ring-roberto-teal/50" />
                            <div class="text-center sm:text-left">
                                <blockquote class="text-lg italic text-gray-600 mb-4">
                                    "The trip from Mumbai to Pune was seamless! The driver was professional, the car was
                                    spotless, and we arrived well ahead of schedule. Bharat InterCity Express is now my
                                    go-to for all business travel in India."
                                </blockquote>
                                <p class="font-bold text-roberto-dark text-xl">Rahul Sharma</p>
                                <p class="text-sm text-gray-500">Business Traveler, Pune</p>
                                <div class="flex justify-center sm:justify-start mt-2 space-x-1">
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star-half" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Swiper Slide 2 -->
                    <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row items-center sm:items-start space-y-6 sm:space-y-0 sm:space-x-8">
                            <img src="{{ asset('images/Testimonial1.png') }}" alt="Reviewer Arun Patel"
                                class="w-24 h-24 rounded-full object-cover ring-4 ring-roberto-teal/50" />
                            <div class="text-center sm:text-left">
                                <blockquote class="text-lg italic text-gray-600 mb-4">
                                    "We used their service for the Delhi-Jaipur route and the experience was fantastic.
                                    Comfortable vehicle and a very polite driver who navigated the highways expertly. Highly
                                    recommended for family trips!"
                                </blockquote>
                                <p class="font-bold text-roberto-dark text-xl">Arun Patel</p>
                                <p class="text-sm text-gray-500">Family Traveler, Delhi</p>
                                <div class="flex justify-center sm:justify-start mt-2 space-x-1">
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Swiper Slide 3 -->
                    <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row items-center sm:items-start space-y-6 sm:space-y-0 sm:space-x-8">
                            <img src="{{ asset('images/Testimonial2.png') }}" alt="Reviewer Priya Singh"
                                class="w-24 h-24 rounded-full object-cover ring-4 ring-roberto-teal/50" />
                            <div class="text-center sm:text-left">
                                <blockquote class="text-lg italic text-gray-600 mb-4">
                                    "Reliable connection from Bengaluru airport to Chennai. Booking was easy, communication
                                    was clear, and the overall ride was very relaxing. I appreciate the dedicated focus on
                                    inter-city routes."
                                </blockquote>
                                <p class="font-bold text-roberto-dark text-xl">Priya Singh</p>
                                <p class="text-sm text-gray-500">Solo Commuter, Chennai</p>
                                <div class="flex justify-center sm:justify-start mt-2 space-x-1">
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star-half" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Swiper Pagination -->
                <div class="swiper-pagination mt-8 !relative"></div>
            </div>
        </div>
    </section>

    <!-- Gallery/Visual Section (Converted to Swiper Slider with Navigation) -->
    <section class="container mx-auto px-4 pb-16 md:pb-24">
        <div class="text-center mb-8">
            <span class="text-xs font-bold uppercase text-roberto-teal tracking-widest">GALLERY</span>
            <h2 class="text-4xl font-bold text-roberto-dark mt-2">Connecting India Visually</h2>
        </div>
        <div class="swiper gallery-swiper relative">
            <div class="swiper-wrapper">
                <!-- Swiper Slide 1 -->
                <div class="swiper-slide h-96 rounded-xl overflow-hidden shadow-lg feature-icon-box">
                    <img src="{{ asset('images/The_varanasi_ghat.jpg') }}" alt="The Varanasi Ghats"
                        class="w-full h-full object-cover aspect-video" />
                </div>
                <!-- Swiper Slide 2 -->
                <div class="swiper-slide h-96 rounded-xl overflow-hidden shadow-lg feature-icon-box">
                    <img src="{{ asset('images/Hawa_Mahal_Jaipur.png') }}" alt="Hawa Mahal Jaipur"
                        class="w-full h-full object-cover aspect-video" />
                </div>
                <!-- Swiper Slide 3 -->
                <div class="swiper-slide h-96 rounded-xl overflow-hidden shadow-lg feature-icon-box">
                    <img src="{{ asset('images/Tea_garden_asaam.jpg') }}" alt="Tea Gardens Assam"
                        class="w-full h-full object-cover aspect-video" />
                </div>
                <!-- Swiper Slide 4 -->
                <div class="swiper-slide h-96 rounded-xl overflow-hidden shadow-lg feature-icon-box">
                    <img src="{{ asset('images/Kerala_Backwaters.jpg') }}" alt="Kerala Backwaters"
                        class="w-full h-full object-cover aspect-video" />
                </div>
                <!-- Swiper Slide 5 -->
                <div class="swiper-slide h-96 rounded-xl overflow-hidden shadow-lg feature-icon-box">
                    <img src="{{ asset('images/Mehran_Garh_Jodhpur.jpeg') }}" alt="Mehrangarh Fort Jodhpur"
                        class="w-full h-full object-cover aspect-video" />
                </div>
            </div>
            <!-- Add Navigation Buttons and Pagination -->
            <div class="swiper-button-next text-roberto-dark hidden md:block"></div>
            <div class="swiper-button-prev text-roberto-dark hidden md:block"></div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </section>

    <!-- Latest News & Event (Blog Preview) -->
    <section id="news" class="bg-gray-50 py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase text-roberto-teal tracking-widest">BLOG</span>
                <h2 class="text-4xl font-bold text-roberto-dark mt-2">Indian City Travel Insights</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($blogs as $blog)
                    <!-- Blog Card 1 -->
                    <div class="bg-white rounded-lg shadow-xl overflow-hidden feature-icon-box">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <p class="text-xs text-orange-600 font-semibold mb-2">
                                {{ date('M d, Y', strtotime($blog->updated_at)) }}
                            </p>
                            <a href="{{ route('blog.show', $blog) }}"
                                class="text-xl font-bold text-roberto-dark hover:text-orange-600 transition duration-200 cursor-pointer">
                                {{ $blog->title }}
                            </a>
                            <p class="text-gray-600 mt-3 text-sm">Our guide to the must-try stops for authentic meals and
                                refreshments...</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact CTA Footer Bar -->
    <section id="contact" class="bg-roberto-dark py-12">
        <div
            class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between text-white space-y-6 lg:space-y-0">
            <h3 class="text-3xl font-bold">Ready to book your next city transfer?</h3>
            <a href="#booking-form"
                class="bg-orange-600 text-white font-bold py-3 px-8 rounded-md hover:bg-orange-400 transition duration-300 shadow-xl">
                BOOK NOW
            </a>
        </div>
    </section>
@endsection

@push('extra_scripts')
@endpush
