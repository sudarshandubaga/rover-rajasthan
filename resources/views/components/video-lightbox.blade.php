<div class="relative overflow-hidden [&:hover>img]:scale-125 text-white hover:text-orange-500">
    <img src="{{ $thumbnailUrl }}" alt="Slide 1" loading="lazy" class="aspect-video object-cover w-full transition-all">
    <button class="absolute top-0 left-0 right-0 bottom-0 bg-black/30 flex justify-center items-center vLightbox"
        data-video="{{ $videoID }}">
        <i class="bi bi-play-circle text-8xl"></i>
    </button>
</div>
