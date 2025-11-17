@extends('web.layouts.default')

@section('main_content')
    <x-page-header :page="$page" />
    <section class="py-16 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Text Content & Service Icons -->
                <div>
                    <span class="text-xs font-bold uppercase text-orange-600 tracking-widest">ABOUT US</span>
                    <h2 class="4xl font-bold text-roberto-dark mt-2 mb-6">Your Reliable Partner for <span
                            class="block">Indian
                            Inter-City Travel</span></h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {!! $page->description !!}
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
                    <img src="{{ $page->image }}" alt="">
                </div>
                {{-- <div class="grid grid-cols-2 grid-rows-2 gap-4">
                    <img src="{{ asset('images/amber-fort-jaipur.jpeg') }}" alt="Amber Fort Jaipur"
                        class="w-full h-full object-cover rounded-lg feature-icon-box row-span-1" />
                    <img src="{{ asset('images/qutub_minar_delhi.jpg') }}" alt="Qutub Minar Delhi"
                        class="w-full h-full object-cover rounded-lg feature-icon-box row-span-2" />
                    <img src="{{ asset('images/marine-drive-mumbai-3.jpg') }}" alt="Marine Drive Mumbai"
                        class="w-full h-full object-cover rounded-lg feature-icon-box row-span-1" />
                </div> --}}
            </div>
        </div>
    </section>
@endsection
