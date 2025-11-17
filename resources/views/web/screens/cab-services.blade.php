@extends('web.layouts.page')

@section('page_content')
    <section class="py-16 bg-white">
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-800">Our Fleet</h2>
                <p class="mt-4 text-lg text-slate-600">Choose from a wide range of vehicles to suit your comfort and group
                    size.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cabs as $cab)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 ease-in-out">
                        <img class="w-full h-56 object-cover object-center" src="{{ $cab['imageUrl'] }}"
                            alt="{{ $cab['name'] }}">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-800 mb-1">{{ $cab['name'] }}</h3>
                            <p class="text-sm text-slate-500 mb-3">{{ $cab['type'] }}</p>
                            <div class="flex items-center text-slate-600 mb-4">
                                <svg class="w-5 h-5 mr-2 text-amber-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.124-1.282-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.124-1.282.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                <span>Up to {{ $cab['capacity'] }} passengers</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-amber-600">₹{{ $cab['rate'] }} / km</span>
                                <button
                                    class="bg-roberto-dark text-white font-bold py-2 px-4 rounded-full hover:bg-amber-600 transition-colors duration-300">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
