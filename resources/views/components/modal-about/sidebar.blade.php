@php
$contactInfos = [
    ['name' => 'Brasília, DF', 'icon' => 'heroicon-s-map-pin', 'raw_svg' => '<svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>'],
    // Adicione mais informações conforme necessário, ex: LinkedIn, GitHub
     ['name' => 'LinkedIn Profile', 'icon' => 'heroicon-s-identification', 'url' => '#'],
     ['name' => 'GitHub Profile', 'icon' => 'heroicon-s-code-bracket', 'url' => '#'],
];
$userEmail = 'pedroeduardo.lsousa@gmail.com';
$userPhone = '(61) 99969-9784';
$userPhoneLink = '5561999699784'; // Para o link do WhatsApp
@endphp

<div class="text-center lg:text-left font-poppins flex flex-col text-sm text-gray-300 space-y-4">
    <div class="flex justify-center">
        <img src="{{ asset('images/eu.jpeg') }}" alt="Pedro Sousa" class="w-24 h-24 rounded-full shadow-md mb-4">
        {{-- Bootstrap `rounded-5` é bem redondo, `rounded-full` é o equivalente. Ajustei o tamanho. --}}
    </div>

        <h2 id="modal-title-{{ uniqid() }}" class="text-xl md:text-2xl font-poppins font-bold text-white pr-10"> {{-- pr-10 para espaço do botão X --}}
            Pedro <span class="text-[#4169E1]">Sousa</span>
        </h2>

    @foreach ($contactInfos as $info)
    <div>
        <p class="mb-1">
            <span class="text-[#4169E1] mr-2 align-middle">
                @if(isset($info['raw_svg']))
                    {!! $info['raw_svg'] !!}
                @else
                    {{-- Placeholder para outros ícones, ex: <x-heroicon-s-nome-do-icone class="w-5 h-5 inline-block" /> --}}
                    <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.022 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                @endif
            </span>
            {{ $info['name'] }}
        </p>
        <hr class="border-gray-600">
    </div>
    @endforeach

    <div>
        <a href="https://wa.me/{{ $userPhoneLink }}?text=Olá%20Pedro,%20vi%20seu%20portfólio%20e%20gostaria%20de%20conversar%20mais%20sobre."
           class="mb-1 text-gray-300 hover:text-[#4169E1] no-underline transition-colors block" target="_blank">
            <span class="text-[#4169E1] mr-2 align-middle">
                {{-- Ícone WhatsApp/Telefone (Heroicon: phone) --}}
                <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
            </span>
            {{ $userPhone }}
        </a>
        <hr class="border-gray-600">
    </div>

    <div x-data="{ copied: false }" class="relative">
        <p @click="navigator.clipboard.writeText('{{ $userEmail }}'); copied = true; setTimeout(() => copied = false, 2000)"
           class="mb-1 text-gray-300 hover:text-[#4169E1] cursor-pointer transition-colors block">
            <span class="text-[#4169E1] mr-2 align-middle">
                {{-- Ícone E-mail (Heroicon: envelope) --}}
                <svg class="w-5 h-5 inline-block" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 11.884l7.997-6M2 15V5l8 6 8-6v10a2 2 0 01-2 2H4a2 2 0 01-2-2z"></path></svg>
            </span>
            Copiar E-mail
        </p>
        <span x-show="copied" x-transition class="absolute -top-7 left-1/2 -translate-x-1/2 text-xs bg-green-500 text-white px-2 py-1 rounded shadow-lg">Copiado!</span>
        <hr class="border-gray-600">
    </div>

    <div class="mt-6">
        <a href="{{ asset('path/to/your/cv.pdf') }}" {{-- Substitua pelo caminho real do seu CV --}}
           download="CV_Pedro_Sousa.pdf"
           class="inline-block w-full bg-[#4169E1] text-center text-white font-poppins font-semibold no-underline rounded-full py-2 px-4
                  hover:bg-white hover:text-[#4169E1] border-2 border-transparent hover:border-[#4169E1]
                  transition-all duration-300 ease-in-out transform hover:scale-105
                  focus:outline-none focus:ring-2 focus:ring-[#4169E1] focus:ring-opacity-50 text-sm">
            {{-- Ícone Download (Heroicon: arrow-down-tray) --}}
            <svg class="w-4 h-4 inline-block mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            Download CV
        </a>
    </div>
</div>
