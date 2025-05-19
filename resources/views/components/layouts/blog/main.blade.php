<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tags SEO Dinâmicas - Preenchidas pelo seu componente Livewire (BlogIndex ou BlogShow) --}}
    <title>{{ $title ?? 'Blog do Pedro - Desenvolvimento e Trajetória' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Acompanhe minha jornada, aprendizados e reflexões sobre desenvolvimento de software, tecnologia e carreira.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'blog, pedro sousa, desenvolvimento, carreira, tecnologia, laravel, tall stack' }}">

    {{-- Open Graph (para Facebook, LinkedIn, etc.) --}}
    <meta property="og:title" content="{{ $ogTitle ?? $title ?? 'Blog do Pedro' }}">
    <meta property="og:description" content="{{ $ogDescription ?? $metaDescription ?? 'Acompanhe minha trajetória...' }}">
    <meta property="og:type" content="{{ $ogType ?? 'blog' }}"> {{-- 'blog' para o índice, 'article' para posts --}}
    <meta property="og:url" content="{{ $ogUrl ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/blog_default_og.png') }}"> {{-- Crie uma imagem OG padrão para o blog --}}
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    @if(isset($articlePublishedTime))<meta property="article:published_time" content="{{ $articlePublishedTime }}">@endif
    @if(isset($articleModifiedTime))<meta property="article:modified_time" content="{{ $articleModifiedTime }}">@endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $twitterTitle ?? $ogTitle ?? $title ?? 'Blog do Pedro' }}">
    <meta name="twitter:description" content="{{ $twitterDescription ?? $ogDescription ?? $metaDescription ?? 'Acompanhe minha trajetória...' }}">
    <meta name="twitter:image" content="{{ $twitterImage ?? $ogImage ?? asset('images/blog_default_og.png') }}">
    {{-- <meta name="twitter:site" content="@seuTwitterHandle"> --}}


    {{-- Assume que o blog usa o mesmo bundle de CSS/JS principal --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>[x-cloak] { display: none !important; }</style> {{-- Para Alpine.js, se usar --}}
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased"> {{-- Exemplo: um tema mais claro para o blog --}}

    {{-- Cabeçalho Específico do Blog --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div>
                    <a href="{{ route('blog.index') }}" class="text-xl font-bold font-poppins text-[#4169E1]">
                        {{ __('blog.title') }} {{-- Ex: "Blog da Minha Trajetória" --}}
                    </a>
                </div>
                <div class="space-x-4 text-sm">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#4169E1] font-medium">
                        &larr; {{ __('nav.back_to_portfolio') }} {{-- Chave: 'Voltar ao Portfólio' --}}
                    </a>
                    {{-- Aqui você pode adicionar links para categorias do blog, se tiver --}}
                    {{-- Ex: <a href="#" class="text-gray-600 hover:text-[#4169E1]">Categorias</a> --}}

                    {{-- Switcher de Idioma (se você implementou) --}}
                    <div class="inline-flex rounded-md shadow-sm ml-4" role="group">
                        <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 text-xs font-medium {{ app()->getLocale() == 'en' ? 'text-white bg-[#4169E1]' : 'text-gray-700 bg-white hover:bg-gray-50' }} border border-gray-300 rounded-l-lg focus:z-10 focus:ring-2 focus:ring-[#4169E1]">
                            EN
                        </a>
                        <a href="{{ route('language.switch', 'pt_BR') }}" class="px-3 py-1 text-xs font-medium {{ app()->getLocale() == 'pt_BR' ? 'text-white bg-[#4169E1]' : 'text-gray-700 bg-white hover:bg-gray-50' }} border-y border-r border-gray-300 rounded-r-lg focus:z-10 focus:ring-2 focus:ring-[#4169E1]">
                            PT
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- Conteúdo Principal do Blog (onde o Livewire injetará BlogIndex ou BlogShow) --}}
    <main class="min-h-screen"> {{-- min-h-screen para empurrar o footer para baixo se o conteúdo for curto --}}
        {{ $slot }}
    </main>

    {{-- Rodapé Específico do Blog --}}
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
    {{-- Seus scripts globais ou específicos do blog aqui --}}
</body>
</html>
