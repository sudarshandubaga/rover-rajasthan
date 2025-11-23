@extends('web.layouts.page')

@section('page_content')
    {{-- How it Works Section --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-800">How It Works</h2>
                <p class="mt-4 text-lg text-slate-600">Crafting your perfect trip is easy with our simple 3-step process.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">

                {{-- Step Component --}}
                @php
                    $steps = [
                        [
                            'number' => '1',
                            'title' => 'Share Your Vision',
                            'description' =>
                                'Fill out the form below with your travel preferences, interests, and ideas.',
                        ],
                        [
                            'number' => '2',
                            'title' => 'Get a Draft Plan',
                            'description' =>
                                'Our experts will design a custom itinerary and quote, tailored just for you.',
                        ],
                        [
                            'number' => '3',
                            'title' => 'Refine & Book',
                            'description' =>
                                'Review your plan, request changes, and once you\'re happy, book your trip!',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <div class="relative text-center">
                        <div
                            class="mx-auto h-16 w-16 flex items-center justify-center bg-orange-100 text-orange-600 rounded-full text-2xl font-bold mb-4">
                            {{ $step['number'] }}
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $step['title'] }}</h3>
                        <p class="text-slate-600">{{ $step['description'] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Customization Form --}}
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-slate-800 mb-6 text-center">Tell Us Your Travel Plans</h2>

                <form action="{{ route('customize-tour.store') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf

                    {{-- Personal Info --}}
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-orange-700 border-b pb-2 mb-4">Personal Information</h3>
                    </div>

                    <input type="text" name="name" placeholder="Your Name"
                        class="w-full p-3 border border-slate-300 rounded-md" required>
                    <input type="email" name="email" placeholder="Your Email"
                        class="w-full p-3 border border-slate-300 rounded-md" required>

                    {{-- Trip Details --}}
                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-orange-700 border-b pb-2 mb-4">Trip Details</h3>
                    </div>

                    <input type="text" name="destinations" placeholder="Destination(s) of Interest"
                        class="md:col-span-2 w-full p-3 border border-slate-300 rounded-md">

                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Start Date</label>
                        <input type="date" name="start_date" class="w-full p-3 border border-slate-300 rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">End Date</label>
                        <input type="date" name="end_date" class="w-full p-3 border border-slate-300 rounded-md">
                    </div>

                    <input type="number" name="travelers" placeholder="Number of Travelers"
                        class="w-full p-3 border border-slate-300 rounded-md" min="1">

                    <select name="budget" class="w-full p-3 border border-slate-300 rounded-md text-slate-500">
                        <option value="">Budget per Person (INR)</option>
                        <option value="<1000">Under ₹1000</option>
                        <option value="1000-2000">₹1000 - ₹5000</option>
                        <option value="2000-3000">₹5000 - ₹10000</option>
                        <option value=">3000">Over ₹10000</option>
                    </select>

                    {{-- Preferences --}}
                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-orange-700 border-b pb-2 mb-4">Your Preferences</h3>
                    </div>

                    @php
                        $interests = [
                            'History & Culture',
                            'Adventure & Outdoors',
                            'Wildlife & Nature',
                            'Food & Culinary',
                            'Relaxation & Wellness',
                            'Shopping',
                        ];
                    @endphp

                    <div class="md:col-span-2">
                        <label class="block text-base font-medium text-slate-700 mb-3">What are your interests?</label>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach ($interests as $interest)
                                <label class="flex items-center space-x-2 text-slate-600">
                                    <input type="checkbox" name="interests[]" value="{{ $interest }}"
                                        class="h-4 w-4 rounded border-slate-300 text-orange-600">
                                    <span>{{ $interest }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <select name="accommodation" class="w-full p-3 border border-slate-300 rounded-md text-slate-500">
                        <option value="">Accommodation Style</option>
                        <option value="budget">Budget</option>
                        <option value="mid-range">Mid-range</option>
                        <option value="luxury">Luxury</option>
                        <option value="boutique">Boutique / Heritage</option>
                    </select>

                    <select name="pace" class="w-full p-3 border border-slate-300 rounded-md text-slate-500">
                        <option value="">Preferred Travel Pace</option>
                        <option value="relaxed">Relaxed</option>
                        <option value="moderate">Moderate</option>
                        <option value="fast-paced">Fast-paced</option>
                    </select>

                    <textarea name="notes" rows="5" placeholder="Any other requirements or specific places you want to visit?"
                        class="md:col-span-2 w-full p-3 border border-slate-300 rounded-md"></textarea>

                    <div class="md:col-span-2 text-center mt-4">
                        <button type="submit"
                            class="bg-amber-500 text-white font-bold py-3 px-10 rounded-full text-lg hover:bg-amber-600 transition">
                            Get My Free Quote
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
