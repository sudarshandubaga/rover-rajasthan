@props(['page', 'links' => []])

<section class="bg-gray-700 relative">
    <img src="{{ $page->image ?: asset('images/page_bg.png') }}" alt="{{ $page->title }}"
        class="w-full h-full object-cover lg:aspect-[4/1]">
    <div class="absolute left-0 right-0 bottom-0 top-0 flex flex-col justify-end lg:py-16 py-5 bg-black/70">
        <div class="container">
            <h1 class="text-5xl font-bold text-white mb-3">{{ $page->title }}</h1>
            <div class="flex gap-3 text-gray-300">
                <a href="{{ route('home') }}" class="flex items-center gap-1 text-white font-bold hover:underline">
                    <i class="bi bi-house"></i> Home
                </a>
                <span>&raquo;</span>
                <span>{{ $page->title }}</span>
            </div>
        </div>
    </div>
</section>
