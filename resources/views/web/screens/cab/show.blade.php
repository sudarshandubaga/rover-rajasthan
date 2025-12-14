@extends('web.layouts.default')

@section('main_content')
    <div class="bg-slate-50 font-sans">

        {{-- Hero Section --}}
        <div class="relative h-[50vh] bg-cover bg-center"
            style="background-image: url('https://picsum.photos/seed/mount-abu-road/1920/800')">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative h-full flex flex-col justify-center items-center text-center text-white px-4">
                <h1 class="text-3xl md:text-5xl font-extrabold mb-2 tracking-tight uppercase">
                    {{ $cab->vehicle_type }}
                </h1>
                <p class="text-xl md:text-2xl font-light tracking-widest mb-6">
                    Car Services by {{ $site->title }}
                </p>
                <a href="{{ route('page.show', 'contact-us') }}"
                    class="bg-amber-500 text-slate-900 font-bold py-3 px-8 rounded hover:bg-amber-400 transition-colors duration-300 uppercase text-sm tracking-wider">
                    Enquire Now
                </a>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-24">

            {{-- Section 1: Mount Abu --}}
            <div id="mount-abu" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-amber-500 text-sm font-bold uppercase tracking-widest mb-2">
                        {{ $site->title }}: {{ $cab->vehicle_type }} Taxi Service
                    </h3>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 leading-tight uppercase">
                        {!! $cab->vehicle_type !!}
                    </h2>
                    <div class="space-y-4 text-slate-600 leading-relaxed">
                        {!! $cab->description ?: 'some description goes here...' !!}
                    </div>
                </div>

                <div class="relative flex justify-center">
                    <div class="relative z-10">
                        <img src="{{ $cab->image }}" alt="{{ $cab->vehicle_type }}"
                            class="w-full max-w-md mx-auto object-contain drop-shadow-xl">

                        {{-- Package Card --}}
                        <div
                            class="absolute -bottom-6 left-0 right-0 mx-auto w-64 bg-amber-500 text-white p-4 rounded shadow-lg text-center">
                            <h4 class="font-bold text-lg uppercase mb-1">Price</h4>
                            <div class="text-sm font-medium">
                                <del>₹{{ $cab->regular_fare ?: 0 }}/km</del>
                                <span class="text-3xl font-bold">₹{{ $cab->fare }}/km</span>
                            </div>
                            <a href="{{ route('page.show', 'contact-us') }}"
                                class="block mt-3 bg-white text-amber-600 text-xs font-bold py-2 px-4 rounded uppercase hover:bg-slate-100">
                                Call Now To Book
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <x-cab-pricing />

        </div>
    </div>
@endsection
