@extends('web.layouts.page')

@section('page_content')
    <section class="py-16">
        <div class="container">
            <div class="grid grid-cols-3 gap-10">
                @foreach ($blogs as $blog)
                    <div class="bg-white rounded-3xl overflow-hidden border">
                        <div class="relative">
                            <img src="{{ $blog['image'] }}" alt="" class="w-full aspect-[4/3] object-cover">
                            <div
                                class="absolute size-16 flex flex-col justify-center items-center aspect-square bg-orange-500 text-white -bottom-5 left-5">
                                <div class="text-4xl font-bold">
                                    {{ date('d', strtotime($blog['created_at'])) }}
                                </div>
                                <div class="text-xs">{{ date('M y', strtotime($blog['created_at'])) }}</div>
                            </div>
                        </div>
                        <div class="p-5">
                            <a href="#"
                                class="block text-xl font-bold overflow-hidden text-nowrap text-ellipsis text-orange-500">
                                {{ $blog['title'] }}</a>
                            <p class="mb-5">{{ substr(strip_tags($blog['description']), 0, 128) }}&hellip;</p>
                            <a href=""
                                class="default-btn text-orange-500 border-orange-500 hover:text-white font-bold">
                                More Details &raquo;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
