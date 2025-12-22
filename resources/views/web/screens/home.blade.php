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

                <!-- Service Icons (Updated with 24/7 and ISO details) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center mt-10">
                    <div class="space-y-2">
                        <i class="bi bi-patch-check text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">ISO 9001:2015</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-clock-history text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">24/7 Availability</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-shield-check text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Safety Assured</p>
                    </div>

                    <div class="space-y-2">
                        <i class="bi bi-car-front text-5xl mx-auto text-orange-600"></i>
                        <p class="text-sm font-semibold">Verified Fleet</p>
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
            <!-- Heading -->
            <div class="text-center mb-14">
                <span class="text-xs font-bold uppercase text-roberto-teal tracking-widest">Taxi</span>
                <h2 class="text-4xl font-extrabold text-roberto-dark mt-2">
                    Vehicles We Offer
                </h2>
                <p class="text-gray-500 mt-3 max-w-xl mx-auto">
                    Choose from our wide range of comfortable and reliable vehicles
                </p>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cabs as $cab)
                    <a href="{{ route('cab.show', $cab) }}"
                        class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">

                        <!-- Image -->
                        <div class="relative overflow-hidden">
                            <img src="{{ $cab->image }}" alt="{{ $cab->vehicle_type }}"
                                class="w-full p-3 object-cover transform group-hover:scale-110 transition-transform duration-500">


                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-roberto-dark group-hover:text-orange-500 transition-colors">
                                {{ $cab->vehicle_type }}
                            </h4>

                            <div class="flex items-center justify-between mt-4">
                                <span class="text-gray-500 text-sm">
                                    🚗 {{ $cab->capacity }} Seater
                                </span>

                                <div class="">
                                    <div class="text-lg">
                                    </div>
                                    <div>
                                        <del class="text-sm text-gray-700">&nbsp;₹{{ $cab->regular_fare ?: $cab->fare }} /
                                            km&nbsp;</del>
                                        <span class="text-orange-500 text-3xl font-bold">₹{{ $cab->fare }} / km</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hover CTA -->
                        <div class="opacity-50 group-hover:opacity-100 transition-opacity duration-300 px-6 pb-6 mb-6">
                            <button
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-lg font-semibold transition">
                                Book Now
                            </button>
                        </div>
                    </a>
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