@extends('web.layouts.default')

@section('main_content')
    <x-page-header :page="$page" />

    @if (!empty($page->description))
        <section class="py-16">
            <div class="container space-y-3 text-lg">
                {!! $page->description !!}
            </div>
        </section>
    @endif

    @yield('page_content')
@endsection
