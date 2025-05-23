<div>
@php
$contactDetails = [
[
        'label' => 'GitHub',
        'value' => '@peesousa',
        'url'   => 'https://github.com/peesousa',
        'type'  => 'link',
        'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
</svg>',
    ],
    [
        'label' => 'LinkedIn',
        'value' => '@pedroeduardo-lsousa',
        'url'   => 'https://linkedin.com/in/pedroeduardo-lsousa',
        'type'  => 'link',
        'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>',
    ],
    [
        'label' => 'WhatsApp',
        'value' => '(61) 99969-9784',
        'url'   => 'https://wa.me/5561999699784?text=Olá%20Pedro,%20vi%20seu%20portfólio%20e%20gostaria%20de%20conversar%20mais%20sobre.',
        'type'  => 'link',
        'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.003a1.5 1.5 0 0 1-.44 1.618l-1.086.954a10.5 10.5 0 0 0 4.986 4.986l.954-1.086a1.5 1.5 0 0 1 1.618-.44l3.003.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd" /></svg>',
    ],
    [
        'label' => 'Email',
        'value' => 'pedroeduardo.lsousa@gmail.com',
        'type'  => 'email',
        'copy_text' => 'pedroeduardo.lsousa@gmail.com',
        'icon_svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" /><path d="M19 8.839l-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" /></svg>',
    ]
];
@endphp
    <section class="text-white py-14 lg:py-10">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="text-center lg:text-start">
                <h2 class="text-3xl lg:text-4xl font-poppins font-bold text-start mb-2 lg:mb-4">
                    {{ __('pages.contact.title1') }} <span class="text-[#4169E1]">{{ __('pages.contact.title2') }}</span>
                </h2>
                <hr class="py-2 mb-6 border-dashed border-gray-600">
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-25 items-start">

                <div class="lg:col-span-2 space-y-8" x-data="{ copiedEmailFeedback: false }">
                    @foreach ($contactDetails as $contact)
                        @if ($contact['type'] === 'link')
                            <a href="{{ $contact['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="flex items-center p-2 bg-gray-800 rounded-xl shadow-md hover:bg-gray-700 transition-colors group">
                                <span class="text-[#4169E1] mr-3 group-hover:scale-110 mx-5 transition-transform">
                                    {!! $contact['icon_svg'] !!}
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-white group-hover:text-[#4169E1] transition-colors">{{ $contact['label'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $contact['value'] }}</p>
                                </div>
                            </a>
                        @elseif ($contact['type'] === 'email')
                            <div @click="navigator.clipboard.writeText('{{ $contact['copy_text'] }}'); copiedEmailFeedback = true; setTimeout(() => copiedEmailFeedback = false, 2000)"
                                 class="flex items-center p-2 bg-gray-800 rounded-xl shadow-md hover:bg-gray-700 transition-colors group cursor-pointer relative">
                                <span class="text-[#4169E1] mr-3 group-hover:scale-110 mx-5 transition-transform">
                                    {!! $contact['icon_svg'] !!}
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-white group-hover:text-[#4169E1] transition-colors">{{ $contact['label'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $contact['value'] }}</p>
                                </div>
                                <span x-show="copiedEmailFeedback" x-transition
                                      class="absolute -top-8 left-1/2 -translate-x-1/2 text-xs bg-green-500 text-white px-2 py-1 rounded shadow-lg">
                            copiado!
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="lg:col-span-3 w-full bg-transparent rounded-lg shadow-md">
                    @livewire('contact-form')
                </div>
            </div>
        </div>
    </section>
</div>
