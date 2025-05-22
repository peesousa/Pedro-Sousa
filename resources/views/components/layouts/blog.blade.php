<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Blog do Pedro - Desenvolvimento e Trajetória' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Acompanhe minha jornada, aprendizados e reflexões sobre desenvolvimento de software, tecnologia e carreira.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'blog, pedro sousa, desenvolvimento, carreira, tecnologia, laravel, tall stack' }}">

    <meta property="og:title" content="{{ $ogTitle ?? $title ?? 'Blog do Pedro' }}">
    <meta property="og:description" content="{{ $ogDescription ?? $metaDescription ?? 'Acompanhe minha trajetória...' }}">
    <meta property="og:type" content="{{ $ogType ?? 'blog' }}">
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/blog_default_og.png') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    @if(isset($articlePublishedTime))<meta property="article:published_time" content="{{ $articlePublishedTime }}">@endif
    @if(isset($articleModifiedTime))<meta property="article:modified_time" content="{{ $articleModifiedTime }}">@endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $twitterTitle ?? $ogTitle ?? $title ?? 'Blog do Pedro' }}">
    <meta name="twitter:description" content="{{ $twitterDescription ?? $ogDescription ?? $metaDescription ?? 'Acompanhe minha trajetória...' }}">
    <meta name="twitter:image" content="{{ $twitterImage ?? $ogImage ?? asset('images/blog_default_og.png') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div>
                    <a href="{{ route('blog.index') }}" class="text-xl font-bold font-poppins text-[#4169E1]">
                        {{ __('blog.title') }}
                    </a>
                </div>
                <div class="space-x-4 text-sm">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#4169E1] font-medium">
                        &larr; {{ __('nav.back_to_portfolio') }}
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <footer class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} Pedro Sousa. {{ __('blog.footer_rights') }}
            </p>
            <p class="mt-1">
                <a href="{{ route('home') }}" class="text-xs text-[#4169E1] hover:underline">
                    {{ __('nav.back_to_portfolio') }}
                </a>
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
