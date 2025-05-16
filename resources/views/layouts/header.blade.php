@php
$navLinks = [
    ['route_name' => 'home', 'label_key' => 'nav.home', 'default_label' => 'Início'],
    ['route_name' => 'about', 'label_key' => 'nav.about', 'default_label' => 'Sobre Mim'],
    ['route_name' => 'portfolio', 'label_key' => 'nav.portfolio', 'default_label' => 'Portfólio'],
    ['route_name' => 'contact', 'label_key' => 'nav.contact', 'default_label' => 'Contato'],
];
@endphp

<header>
    <nav x-data="{ openMobileMenu: false }" class="text-white fixed top-0 left-0 right-0 z-50 shadow-md">
    <div class="container mx-auto mt-5  px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-around h-16">
                 <div class="flex-shrink-0">
          <a href="/" class="text-2xl text-[#4169e1] font-bold font-poppins hover:text-white transition ease-in-out duration-250">
              PS
          </a>
      </div>

      <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
              @foreach ($navLinks as $link)
                  <a href="#"
                     class="
                            relative px-3 py-2 uppercase text-sm font-bold text-gray-300 focus:font-extrabold font-poppins hover:text-gray-400 focus:focus:text-[#4169e1] transition duration-150 ease-in-out
                            after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:h-[2px] after:bg-[#4169e1] after:w-0 hover:after:w-full focus:after:w-full after:transition-all after:duration-300 after:ease-in-out
                    ">
                      {{-- Para internacionalização: __('nav.' . $link['name']) --}}
                      {{ $link['default_label'] }}
                  </a>
              @endforeach
          </div>
      </div>

                {{-- Mobile Menu Button --}}
                <div class="md:hidden flex items-center">
                    <button @click="openMobileMenu = !openMobileMenu" type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            aria-controls="mobile-menu" :aria-expanded="openMobileMenu.toString()">
                        <span class="sr-only">Abrir menu principal</span>

                        {{-- Icon: Menu open (hamburger) --}}
                        <svg x-show="!openMobileMenu" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        {{-- Icon: Menu close (X) --}}
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
         x-cloak
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
                    <a href="#"
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
