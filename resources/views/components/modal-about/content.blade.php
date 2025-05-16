{{-- Defina seus dados aqui ou passe-os para o componente --}}
@php
$services = [
    [
        'image' => asset('images/services/laravelAndSpring.png'), // Coloque as imagens em public/images/services/
        'description' => 'Desenvolvo aplicações Back-End com Laravel ou Spring Boot'
    ],
    [
        'image' => asset('images/services/figmaToCode.png'),
        'description' => 'Faço implementações de interfaces baseados em um design'
    ]
];

$skills = [
    ['name' => 'Laravel', 'level' => 'w-11/12', 'text_level' => '90%'], // Tailwind width class
    ['name' => 'PHP', 'level' => 'w-10/12', 'text_level' => '85%'],
    ['name' => 'Vue.js', 'level' => 'w-9/12', 'text_level' => '75%'],
    ['name' => 'Tailwind CSS', 'level' => 'w-10/12', 'text_level' => '80%'],
    // Adicione mais skills
];

$timelineEducation = [
    ['year' => '20XX - 20XX', 'title' => 'Ciência da Computação', 'institution' => 'Instituto Federal de Brasília', 'description' => 'Foco em desenvolvimento full-stack, algoritmos e estruturas de dados.'],
    // Adicione mais itens
];
$timelineWorking = [
    ['year' => '20XX - Presente', 'title' => 'Desenvolvedor Freelancer', 'institution' => 'Projetos Diversos', 'description' => 'Desenvolvimento de aplicações web completas, APIs e integrações para clientes variados.'],
    // Adicione mais itens
];
@endphp

<div class="space-y-10 font-poppins text-sm text-gray-300">
    {{-- Seção Sobre Mim --}}
    <div class="prose prose-base lg:prose-lg prose-invert max-w-none text-gray-300 font-mulish leading-relaxed">
        <h3 class="text-xl lg:text-2xl uppercase font-poppins !text-white !mb-3">
            Sobre <span class="text-[#4169E1]">mim</span>
        </h3>
        <hr class="border-gray-700 !mt-0 !mb-4">
        <p>
            Olá a todos! Meu nome é Pedro Sousa, eu tenho 21 anos e,
            atualmente, sou estudante de Ciência da Computação pelo
            Instituto Federal de Brasília. Durante a trajetória na
            faculdade eu tive a oportunidade de trabalhar com tecnologias
            de desenvolvimento Front-End e Back-End. Logo de cara me
            apaixonei por essas tecnologias e desde então eu trabalho com
            elas utilizando algumas ferramentas como Laravel, Spring Boot,
            Angular e Vue.Js. Durante o período de estudos eu também tive
            contato com outras tecnologias como Git/ GitHub, Docker,
            Bancos de Dados SQL e algumas ferramentas de escritório como
            Word e Excel, além de ter uma boa organização e conhecimento
            de metodologias ágeis, onde eu me destaco mais na utilização
            do Kanban.
        </p>
    </div>

    {{-- Seção Meus Serviços --}}
    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            Meus <span class="text-[#4169E1]">Serviços</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($services as $service)
            <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
                <img src="{{ $service['image'] }}" alt="Serviço" class="w-full h-40 object-cover">
                <div class="p-4 flex-grow">
                    <p class="text-xs sm:text-sm text-gray-300">{{ $service['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Seção Minhas Skills --}}
    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            Minhas <span class="text-[#4169E1]">Skills</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="space-y-4">
            @foreach ($skills as $skill)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-gray-200">{{ $skill['name'] }}</span>
                    <span class="text-xs font-medium text-[#4169E1]">{{ $skill['text_level'] }}</span>
                </div>
                <div class="w-full bg-gray-600 rounded-full h-2.5">
                    <div class="bg-[#4169E1] h-2.5 rounded-full {{ $skill['level'] }}"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Seção Trajetória Acadêmica --}}
    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            Trajetória <span class="text-[#4169E1]">Acadêmica</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="space-y-6 relative border-l-2 border-gray-600 ml-3 pl-6">
            @foreach ($timelineEducation as $item)
            <div class="relative">
                <div class="absolute -left-[30px] top-1 w-4 h-4 bg-[#4169E1] rounded-full border-2 border-gray-800"></div>
                <p class="text-xs text-gray-400">{{ $item['year'] }}</p>
                <h4 class="text-md font-semibold text-white">{{ $item['title'] }}</h4>
                <p class="text-xs text-gray-300 italic">{{ $item['institution'] }}</p>
                @if(isset($item['description']))
                <p class="text-xs text-gray-400 mt-1">{{ $item['description'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- Seção Trajetória Profissional --}}
    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            Trajetória <span class="text-[#4169E1]">Profissional</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="space-y-6 relative border-l-2 border-gray-600 ml-3 pl-6">
             @foreach ($timelineWorking as $item)
            <div class="relative">
                <div class="absolute -left-[30px] top-1 w-4 h-4 bg-[#4169E1] rounded-full border-2 border-gray-800"></div>
                <p class="text-xs text-gray-400">{{ $item['year'] }}</p>
                <h4 class="text-md font-semibold text-white">{{ $item['title'] }}</h4>
                <p class="text-xs text-gray-300 italic">{{ $item['institution'] }}</p>
                 @if(isset($item['description']))
                <p class="text-xs text-gray-400 mt-1">{{ $item['description'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
