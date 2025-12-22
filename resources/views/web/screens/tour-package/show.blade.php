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
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                                </path>
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
                        <p class="text-slate-600 mb-6">
                            <strong>Duration:</strong> {{ $tourPackage->duration ?? 'N/A' }}
                        </p>
                    </div>
                    <div class="bg-white p6 rounded shadow-lg mt-16">
                        @foreach ($relatedTours as $tour)
                            <a href="{{ route('tour.show', $tour) }}" class="flex items-center gap-4 mb-4">
                                <img src="{{ $tour->image }}" alt="{{ $tour->name }}"
                                    class="w-16 h-16 object-cover rounded-full">
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-800">{{ $tour->name }}</h3>
                                    <p class="text-slate-600">{{ $tour->description }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </aside>
            </div>

            {{-- Gallery --}}
            @if (!empty($tourPackage->gallery))
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-slate-800 mb-6 text-center">Photo Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($tourPackage->gallery as $img)
                            <a href="{{ $img }}" data-fancybox="gallery" class="overflow-hidden rounded-lg shadow-md group">
                                <img src="{{ $img }}" alt="{{ $tourPackage->name }} image"
                                    class="w-full h-full object-cover aspect-square transform group-hover:scale-110 transition-transform duration-300" />
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('extra_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@push('extra_scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
@endpush