@extends('web.layouts.default')

@section('main_content')
    <section class="relative pt-24 pb-16 bg-[#F8FAFC]">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-[#122B47] mb-4">Guest Feedback</h1>
                <p class="text-lg text-gray-600">Your experiences drive our excellence. Share your journey with us.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Feedback Form --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-24 border border-gray-100">
                        <h2 class="text-2xl font-bold text-[#122B47] mb-6">Leave a Review</h2>

                        @if(session('success'))
                            <div
                                class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm flex items-center gap-3">
                                <i class="bi bi-check-circle-fill text-lg"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                                    placeholder="John Doe">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Mobile No.</label>
                                    <input type="text" name="mobile" required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                                        placeholder="+91 00000 00000">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                                    <input type="email" name="email" required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                                        placeholder="john@example.com">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Rating</label>
                                <div class="flex items-center gap-2" id="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button" data-rating="{{ $i }}"
                                            class="star-btn text-2xl transition hover:scale-110">
                                            <i class="bi bi-star-fill {{ $i <= 5 ? 'text-orange-400' : 'text-gray-200' }}"></i>
                                        </button>
                                    @endfor
                                    <input type="hidden" name="rating" id="rating-input" value="5">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Your Message</label>
                                <textarea name="message" rows="4" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition"
                                    placeholder="Tell us about your experience..."></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-[#122B47] text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition-all duration-300 shadow-lg hover:shadow-orange-500/20 active:scale-95">
                                Submit Feedback
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Feedback List --}}
                <div class="lg:col-span-2">
                    <div class="space-y-6">
                        @forelse($feedbacks as $item)
                            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm transition hover:shadow-md">
                                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-xl uppercase">
                                            {{ substr($item->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-bold text-[#122B47]">{{ $item->name }}</h3>
                                            <p class="text-sm text-gray-400">{{ $item->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i
                                                class="bi bi-star-fill {{ $i <= $item->rating ? 'text-orange-400' : 'text-gray-200' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-600 leading-relaxed italic mx-2">
                                    "{{ $item->message }}"
                                </p>
                            </div>
                        @empty
                            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                                <i class="bi bi-chat-heart text-5xl text-gray-200 mb-4 block"></i>
                                <p class="text-gray-400 italic">No feedback yet. Be the first to share!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('extra_scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stars = document.querySelectorAll('.star-btn');
                const ratingInput = document.getElementById('rating-input');

                stars.forEach(star => {
                    star.addEventListener('click', () => {
                        const rating = star.getAttribute('data-rating');
                        ratingInput.value = rating;

                        stars.forEach(s => {
                            const sRating = s.getAttribute('data-rating');
                            const icon = s.querySelector('i');
                            if (sRating <= rating) {
                                icon.classList.remove('text-gray-200');
                                icon.classList.add('text-orange-400');
                            } else {
                                icon.classList.remove('text-orange-400');
                                icon.classList.add('text-gray-200');
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection