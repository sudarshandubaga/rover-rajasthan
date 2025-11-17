{{-- <ul class="{{ $className }}">
    @foreach ($menus as $menu)
        <li>
            <a href="{{ $menu->page?->slug == 'home' ? route('home') : route('page.show', $menu->page) }}"
                class="{{ $linkClass }}" title="{{ $menu->label }}">
                {!! $before !!}{{ $menu->label }}
            </a>
        </li>
    @endforeach
</ul> --}}
