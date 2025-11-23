<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page->seo_title ?: $site->title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <meta name="keywords" content="{{ $page->seo_keywords }}">
    <meta name="description" content="{{ $page->seo_description }}">
    <meta name="author" content="{{ $site->title }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph for Social Media -->
    <meta property="og:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta property="og:description" content="{{ $page->seo_description }}">
    <meta property="og:image" content="{{ $page->image }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Twitter Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->seo_title ?: $site->title }}">
    <meta name="twitter:description" content="{{ $page->seo_description }}">
    <meta name="twitter:image" content="{{ $page->image }}">

    <!-- Canonical URL to Avoid Duplicate Content Issues -->
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ $site->favicon }}" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-700 antialiased">
    <x-header />

    <main>
        @yield('main_content')
    </main>

    <x-footer />


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Toggle mobile menu
        document.getElementById('mobile-menu-toggle').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @vite('resources/js/app.js')

    @stack('extra_scripts')
</body>

</html>
