<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfólio de Pedro Sousa - Desenvolvedor Full Stack especialista em TALL Stack e Laravel.">

    <title>Pedro Sousa | Desenvolvedor Laravel</title>

    @vite('resources/css/app.css')
    @livewireStyles

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        #vanta-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        main {
            position: relative;
            z-index: 55;
        }
    </style>
</head>
<body class=""> <div id="vanta-background"></div>
        <x-intro/>
    @php
        $navLinks = [
            ['route_name' => 'home', 'label_key' => 'nav.home', 'default_label' => 'Início'],
            ['route_name' => 'about', 'label_key' => 'nav.about', 'default_label' => 'Sobre Mim'],
            ['route_name' => 'portfolio', 'label_key' => 'nav.portfolio', 'default_label' => 'Portfólio'],
            ['route_name' => 'blog', 'label_key' => 'nav.blog', 'default_label' => 'Blog'],
            ['route_name' => 'contact', 'label_key' => 'nav.contact', 'default_label' => 'Contato'],
        ];
    @endphp

    <header>
        <nav x-data="{ openMobileMenu: false }" class="text-white fixed top-0 left-0 right-0 z-50 shadow-md">
            <div class="container mx-auto mt-5 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-around h-16">
                    <div class="flex-shrink-0">
                        <div class="relative group w-13 h-13 rounded-full flex items-center justify-center overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-full border-2 border-[#4169e1] rotate-[270deg] origin-center scale-[1.05]
                                [clip-path:inset(0_0_0_100%)] transition-[clip-path] duration-[800ms] ease-out
                                group-hover:[clip-path:inset(0_0_0_0%)]">
                            </span>
                            <a href="{{ route('home') }}"
                                class="text-2xl text-[#4169e1] font-bold font-poppins group-hover:text-white transition ease-in-out duration-300 z-10">
                                PS
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            @foreach ($navLinks as $link)
                                <a href="{{ route($link['route_name']) }}"
                                    class="
                                        relative px-3 py-2 uppercase text-sm font-bold text-gray-300 focus:font-extrabold font-poppins hover:text-gray-400 focus:focus:text-[#4169e1] transition duration-150 ease-in-out
                                        after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:h-[2px] after:bg-[#4169e1] after:w-0 hover:after:w-full focus:after:w-full after:transition-all after:duration-300 after:ease-in-out
                                    ">
                                    {{ $link['default_label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="md:hidden flex items-center">
                        <button @click="openMobileMenu = !openMobileMenu" type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            aria-controls="mobile-menu" :aria-expanded="openMobileMenu.toString()">
                            <span class="sr-only">Abrir menu principal</span>
                            <svg x-show="!openMobileMenu" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="openMobileMenu" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="openMobileMenu"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 -translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-300 transform"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-full"
                class="md:hidden fixed inset-0 z-40 flex" id="mobile-menu"
                @click.away="openMobileMenu = false"
>
                <div x-show="openMobileMenu"
                    x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-black/50 backdrop-blur-sm md:hidden" aria-hidden="true">
                </div>
                <div class="relative flex flex-col w-64 h-full bg-gray-800 text-white shadow-xl py-4 z-50">
                    <div class="px-4 py-2 flex justify-between items-center border-b border-gray-700">
                        <h5 class="text-lg font-semibold font-poppins">Menu</h5>
                        <button @click="openMobileMenu = false" type="button"
                            class="p-1 rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none">
                            <span class="sr-only">Fechar menu</span>
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 flex-1 px-2 space-y-1">
                        @foreach ($navLinks as $link)
                            <a href="{{ route($link['route_name']) }}"
                                @click="openMobileMenu = false"
                                class="block px-3 py-2 rounded-md text-base font-medium font-poppins hover:bg-gray-700 hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                                {{ $link['default_label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </nav>

        <div class="pt-16"></div>
    </header>

    <div x-data="{showPageContent: false}"
        x-init="
            showPageContent = false;
            requestAnimationFrame(() => {
                setTimeout(() => {showPageContent = true;}, 30);
            });
        "
        x-show="showPageContent"
         x-transition:enter="transition ease-in-out duration-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-cloak
         class="flex-grow"
    >
        {{ $slot }}
    </div>

    @livewireScripts
    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof VANTA !== 'undefined' && VANTA.WAVES) {
                VANTA.WAVES({
                    el: "#vanta-background",
                    mouseControls: true,
                    touchControls: true,
                    gyroControls: false,
                    minHeight: 200.00,
                    minWidth: 200.00,
                    scale: 1.00,
                    scaleMobile: 1.00,
                    color: 0x0,
                    shininess: 10,
                    waveHeight: 15.00,
                    waveSpeed: 0.60,
                    zoom: 0.80,
                });

            } else {
                console.error("VANTA.WAVES não foi encontrado. Verifique o carregamento dos scripts.");
            }
        });
    </script>
</body>
</html>
