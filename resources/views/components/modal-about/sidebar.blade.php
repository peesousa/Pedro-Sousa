@php
$contactInfos = [
    ['name' => 'Brasília, DF', 'icon' => 'heroicon-s-map-pin', 'raw_svg' => '<svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>'],

     ['name' => 'GitHub', 'icon' => 'heroicon-s-identification', 'raw_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
</svg>', 'url' => 'https://github.com/peesousa'],

     ['name' => 'LinkedIn', 'icon' => 'heroicon-s-code-bracket', 'raw_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>','url' => 'https://www.linkedin.com/in/pedroeduardo-lsousa'],
];
$userEmail = 'pedroeduardo.lsousa@gmail.com';
$userPhoneLink = '5561999699784';

$whatsappMessagePT = 'https://wa.me/' . $userPhoneLink . '?text=' . urlencode('Olá Pedro, tudo bem? Acessei seu portfólio e gostaria de conversar sobre possíveis oportunidades ou colaborações.');
$whatsappMessageEN = 'https://wa.me/' . $userPhoneLink . '?text=' . urlencode('Hi Pedro, I just visited your portfolio and would love to talk about potential opportunities or collaborations.');
@endphp

<div class="text-center lg:text-left font-poppins flex flex-col text-sm text-gray-300 space-y-4">
    <div class="flex justify-center">
        <img src="{{ asset('images/eu.jpeg') }}" alt="Pedro Sousa" class="w-24 h-24 rounded-full shadow-md mb-4">
    </div>

        <h2 id="modal-title-{{ uniqid() }}" class="text-xl md:text-2xl font-poppins font-bold text-white pr-10">            Pedro <span class="text-[#4169E1]">Sousa</span>
        </h2>

    @foreach ($contactInfos as $info)
    <div>
        <p class="mb-1 flex items-center gap-2">
            <span class="text-[#4169E1] w-5 h-5 flex-shrink-0">
                @if(isset($info['raw_svg']))
                    <span class="inline-block w-5 h-5 align-middle">{!! $info['raw_svg'] !!}</span>
                @else
                    <svg class="w-5 h-5" fill="currentColor" ...></svg>
                @endif
            </span>

            @if(isset($info['url']))
                <a href="{{ $info['url'] }}" class="text-gray-300 hover:text-[#4169E1] transition-colors" target="_blank" rel="noopener noreferrer">
                    {{ $info['name'] }}
                </a>
            @else
                <span class="text-gray-300">{{ $info['name'] }}</span>
            @endif
        </p>
        <hr class="border-gray-600">
    </div>
    @endforeach

    <div>
        <a href="{{ App::getLocale() === 'pt_BR' ? $whatsappMessagePT : $whatsappMessageEN }}"
           class="mb-1 text-gray-300 hover:text-[#4169E1] no-underline transition-colors block" target="_blank">
            <span class="text-[#4169E1] mr-2 align-middle">
                <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
            </span>
            {{ App::getLocale() === 'pt_BR' ? '(61) 99969-9784' : '+55 61 99969-9784' }}
        </a>
        <hr class="border-gray-600">
    </div>

    <div x-data="{ copied: false }" class="relative">
        <p @click="navigator.clipboard.writeText('{{ $userEmail }}'); copied = true; setTimeout(() => copied = false, 2000)"
           class="mb-1 text-gray-300 hover:text-[#4169E1] cursor-pointer transition-colors block">
            <span class="text-[#4169E1] mr-2 align-middle">
                <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 11.884l7.997-6M2 15V5l8 6 8-6v10a2 2 0 01-2 2H4a2 2 0 01-2-2z"></path></svg>
            </span>
            {{ __('modal_about.button_copy_email') }}
        </p>
        <span x-show="copied" x-transition class="absolute -top-7 left-1/2 -translate-x-1/2 text-xs bg-green-500 text-white px-2 py-1 rounded shadow-lg">{{ __('modal_about.copied_message') }}</span>
        <hr class="border-gray-600">
    </div>

    <div class="mt-6 w-full" x-data="{ isOpen: false }">
        <div class="relative flex justify-start">
            <button @click="isOpen = !isOpen"
                    type="button"
                    class="inline-flex items-center justify-center gap-x-1.5 rounded-full bg-[#4169E1] text-white font-poppins font-semibold no-underline py-1.5 px-3 shadow-sm hover:bg-white hover:text-[#4169E1] border-2 border-transparent hover:border-[#4169E1] transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#4169E1] focus:ring-opacity-50 text-xs sm:text-sm"
                    id="cv-menu-button"
                    aria-expanded="isOpen"
                    aria-haspopup="true">

                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>

                {{ __('modal_about.button_download_cv') }}

                <svg class="-mr-0.5 ml-1 size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>

            <div x-show="isOpen"
                x-cloak
                @click.outside="isOpen = false"
                @keydown.escape.window="isOpen = false"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute top-0 left-full ml-2 z-20 mt-0 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu"
                aria-orientation="vertical"
                aria-labelledby="cv-menu-button"
                tabindex="-1">
                <div class="py-1" role="none">
                    <a href="{{ asset('cvs/CV_PEDRO_SOUSA_PTBR.pdf') }}"
                    download="CV_Pedro_Sousa_PTBR.pdf"
                    @click="isOpen = false"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors w-full text-left"
                    role="menuitem"
                    tabindex="-1"
                    id="cv-menu-item-pt">
                        {{ __('modal_about.cv_option_pt_BR') }}
                    </a>
                    <a href="{{ asset('cvs/CV_PEDRO_SOUSA_EN.pdf') }}"
                    download="CV_Pedro_Sousa_EN.pdf"
                    @click="isOpen = false"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors w-full text-left"
                    role="menuitem"
                    tabindex="-1"
                    id="cv-menu-item-en">
                        {{ __('modal_about.cv_option_en') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
