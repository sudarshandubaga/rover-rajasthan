<a href="{{ route('home') }}" class="flex items-end gap-1 max-w-[200px]">
    <img src="{{ $site->logo }}" alt="{{ $site->title }}" class="h-16">
    <div class="text-white">
        <div class="text-[22px] leading-[90%] mb-[2px] uppercase font-medium" style="font-family: 'Cinzel', serif;">
            {{ $site->title }}</div>
        <div class="text-[10px] leading-3 text-gray-300 mb-[-2px]">{{ $site->tagline }}</div>
    </div>
</a>
