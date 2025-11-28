@extends('web.layouts.default')

@section('main_content')
    <x-page-header :page="$page" />
    <section class="py-16 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">Tour Overview</h2>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        {!! $tourPackage->long_description ?? $tourPackage->description !!}
                    </p>

                    {{-- Itinerary --}}
                    @if (!empty($tourPackage->itinerary))
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-slate-800 mb-4">Itinerary</h3>
                            <div class="space-y-4 border-l-2 border-sky-200 pl-6">
                                @foreach ($tourPackage->itinerary as $item)
                                    <div class="relative">
                                        <div class="absolute -left-[34px] top-1 h-4 w-4 rounded-full bg-sky-500"></div>
                                        <h4 class="font-semibold text-sky-700">{{ $item['day'] }}</h4>
                                        <p class="text-slate-600">{{ $item['description'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Inclusions --}}
                        @if (!empty($tourPackage->inclusions))
                            <div>
                                <h3 class="text-2xl font-bold text-slate-800 mb-4">Inclusions</h3>
                                <ul class="space-y-2">
                                    @foreach ($tourPackage->inclusions as $item)
                                        <li class="flex items-start">
                                            <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                            <span class="text-slate-600">{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Exclusions --}}
                        @if (!empty($tourPackage->exclusions))
                            <div>
                                <h3 class="text-2xl font-bold text-slate-800 mb-4">Exclusions</h3>
                                <ul class="space-y-2">
                                    @foreach ($tourPackage->exclusions as $item)
                                        <li class="flex items-start">
                                            <svg class="h-6 w-6 text-red-500 mr-2" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            <span class="text-slate-600">{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:sticky top-28 self-start">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="text-3xl font-bold text-sky-600">
                            ₹{{ $tourPackage->price }}
                            <span class="text-lg font-normal text-slate-500">/ person</span>
                        </p>
                        <p class="text-slate-600 mt-2">
                            <strong>Duration:</strong> {{ $tourPackage->duration ?? 'N/A' }}
                        </p>
                        <a href="/contact-us"
                            class="mt-6 w-full text-center block bg-amber-500 text-white font-bold py-3 px-6 rounded-full text-lg hover:bg-amber-600 transition-colors duration-300">
                            Book This Tour
                        </a>
                    </div>
                </aside>
            </div>

            {{-- Gallery --}}
            @if (!empty($tourPackage->gallery))
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-slate-800 mb-6 text-center">Photo Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($tourPackage->gallery as $img)
                            <div class="overflow-hidden rounded-lg shadow-md">
                                <img src="{{ $img }}" alt="{{ $tourPackage->name }} image"
                                    class="w-full h-full object-cover aspect-square transform hover:scale-110 transition-transform duration-300" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
