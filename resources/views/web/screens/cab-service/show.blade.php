@extends('web.layouts.default')

@section('main_content')
    <div class="bg-slate-50 font-sans">

        {{-- Hero Section --}}
        <div class="relative h-[50vh] bg-cover bg-center"
            style="background-image: url('https://picsum.photos/seed/mount-abu-road/1920/800')">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative h-full flex flex-col justify-center items-center text-center text-white px-4">
                <h1 class="text-3xl md:text-5xl font-extrabold mb-2 tracking-tight uppercase">
                    {{ $cabService->title }}
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
                        {{ $site->title }}: {{ $cabService->title }} Taxi Service
                    </h3>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 leading-tight uppercase">
                        {!! $cabService->title1 !!}
                    </h2>
                    <div class="space-y-4 text-slate-600 leading-relaxed">
                        {!! $cabService->description1 !!}
                    </div>
                </div>

                <div class="relative flex justify-center">
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-amber-400 rounded-full opacity-20 z-0">
                    </div>

                    <div class="relative z-10">
                        <img src="{{ $cabService->image1 }}" alt="{{ $cabService->title1 }}"
                            class="w-full max-w-md mx-auto object-contain drop-shadow-xl">

                        {{-- Package Card --}}
                        <div
                            class="absolute -bottom-6 left-0 right-0 mx-auto w-64 bg-amber-500 text-white p-4 rounded shadow-lg text-center">
                            <h4 class="font-bold text-lg uppercase mb-1">Package Price</h4>
                            <div class="text-sm font-medium">
                                <p>Sedan :- Starting from ₹12/km</p>
                                <p>SUV :- Starting from ₹18/km</p>
                            </div>
                            <a href="{{ route('page.show', 'contact-us') }}"
                                class="block mt-3 bg-white text-amber-600 text-xs font-bold py-2 px-4 rounded uppercase hover:bg-slate-100">
                                Call Now To Book
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (!empty($cabService->title2))
                {{-- Section 2: Airport --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="order-2 lg:order-1 relative flex justify-center">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] bg-amber-400 rounded-full opacity-20 z-0">
                        </div>
                        <img src="{{ $cabService->image2 }}" alt="{{ $cabService->title2 }}"
                            class="relative z-10 w-full max-w-md mx-auto object-contain drop-shadow-xl">
                    </div>

                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 uppercase">
                            {{ $cabService->title2 }}
                        </h2>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            {!! $cabService->description2 !!}
                        </p>
                        <a href="{{ route('page.show', 'contact-us') }}"
                            class="inline-block border-2 border-amber-500 text-amber-500 font-bold py-2 px-6 rounded hover:bg-amber-500 hover:text-white transition-colors duration-300 uppercase text-sm">
                            Rent Cab Now 🚕
                        </a>
                    </div>
                </div>
            @endif

            @if (!empty($cabService->title3))
                {{-- Section 3: Osian --}}
                <div id="osian" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <img src="{{ $cabService->image3 }}" alt="{{ $cabService->title3 }}"
                            class="w-full rounded-lg shadow-lg">
                    </div>

                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 uppercase">
                            {{ $cabService->title3 }}
                        </h2>
                        <p class="text-slate-600 leading-relaxed">
                            {!! $cabService->description3 !!}
                        </p>
                    </div>
                </div>
            @endif

            {{-- Pricing Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-slate-200 shadow-sm rounded-lg">
                    <thead>
                        <tr class="bg-amber-500 text-white">
                            <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Cab Option</th>
                            <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Capacity</th>
                            <th class="py-3 px-6 text-left font-bold uppercase tracking-wider">Cab Fare Per Day</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach ($cabs as $cab)
                            <tr class="hover:bg-slate-50">
                                <td class="py-4 px-6 font-medium">{{ $cab->vehicle_type }}</td>
                                <td class="py-4 px-6">{{ $cab->capacity }} Seater</td>
                                <td class="py-4 px-6">
                                    @if (parseFloat($cab->regular_fare) > $cab->fare)
                                        <del class="text-xs text-gray-500">₹{{ $cab->regular_fare ?: $cab->fare }}/km</del>
                                    @endif
                                    <span class="text-lg font-bold">₹{{ $cab->fare }}/km</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Notes --}}
            <div class="bg-slate-100 p-8 rounded-lg border-l-4 border-amber-500">
                <h3 class="text-2xl font-bold text-amber-500 mb-4 uppercase">Note</h3>
                {!! $cabService->note !!}
            </div>

            @if (!empty($cabService->title4))
                {{-- Section 4: Package --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-6 uppercase">
                            {{ $cabService->title4 }}
                        </h2>
                        <div class="space-y-4 text-slate-600 leading-relaxed text-sm">
                            {!! $cabService->description4 !!}
                        </div>
                    </div>

                    <div>
                        <img src="{{ $cabService->image4 }}" alt="{{ $cabService->title4 }}"
                            class="w-full rounded-lg shadow-lg">
                    </div>
                </div>
            @endif

            @if (!empty($cabService->title5))
                {{-- Section 2: Airport --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="order-2 lg:order-1 relative flex justify-center">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[350px] h-[350px] bg-amber-400 rounded-full opacity-20 z-0">
                        </div>
                        <img src="{{ $cabService->image5 }}" alt="{{ $cabService->title5 }}"
                            class="relative z-10 w-full max-w-md mx-auto object-contain drop-shadow-xl">
                    </div>

                    <div class="order-1 lg:order-2">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 uppercase">
                            {{ $cabService->title5 }}
                        </h2>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            {!! $cabService->description5 !!}
                        </p>
                        <a href="{{ route('page.show', 'contact-us') }}"
                            class="inline-block border-2 border-amber-500 text-amber-500 font-bold py-2 px-6 rounded hover:bg-amber-500 hover:text-white transition-colors duration-300 uppercase text-sm">
                            Rent Cab Now 🚕
                        </a>
                    </div>
                </div>
            @endif

            @if (!empty($cabService->title6))
                {{-- Section 4: Package --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-amber-500 mb-6 uppercase">
                            {{ $cabService->title6 }}
                        </h2>
                        <div class="space-y-4 text-slate-600 leading-relaxed text-sm">
                            {!! $cabService->description6 !!}
                        </div>
                    </div>

                    <div>
                        <img src="{{ $cabService->image6 }}" alt="{{ $cabService->title6 }}"
                            class="w-full rounded-lg shadow-lg">
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
