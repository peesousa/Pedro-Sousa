@php
$skills = [
    ['name' => 'PHP', 'level' => 'w-11/12', 'text_level' => '90%'],
    ['name' => 'Laravel', 'level' => 'w-10/12', 'text_level' => '80%'],
    ['name' => 'HTML5', 'level' => 'w-11/12', 'text_level' => '95%'],
    ['name' => 'CSS3', 'level' => 'w-11/12', 'text_level' => '90%'],
    ['name' => 'JavaScript', 'level' => 'w-9/12', 'text_level' => '75%'],
    ['name' => 'Vue.js', 'level' => 'w-9/12', 'text_level' => '75%'],
    ['name' => 'Angular', 'level' => 'w-7/12', 'text_level' => '65%'],
    ['name' => 'Tailwind CSS', 'level' => 'w-10/12', 'text_level' => '80%'],
    ['name' => 'TALL Stack', 'level' => 'w-10/12', 'text_level' => '80%'],
];
@endphp

<div class="space-y-10 font-poppins text-sm text-gray-300">
    <div class="prose prose-base lg:prose-lg prose-invert max-w-none text-gray-300 font-mulish leading-relaxed">
        <h3 class="text-xl lg:text-2xl uppercase font-poppins !text-white !mb-3">
            {{ __('modal_about.title1') }} <span class="text-[#4169E1]">{{ __('modal_about.title2') }}</span>
        </h3>
        <hr class="border-gray-700 !mt-0 !mb-4">
        <p>{{ __('modal_about.content') }}</p>
    </div>

    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            {{ __('modal_about.quality_services.title1') }} <span class="text-[#4169E1]">{{ __('modal_about.quality_services.title2') }}</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="grid grid-cols-1 gap-6">
            @foreach (__('modal_about.quality_services.items') as $item)
            <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
                {{-- <img src="{{ $service['image'] }}" alt="Serviço" class="w-full h-40 object-cover"> --}}
                <div class="p-4 flex items-center">
                    <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <p class="text-xs sm:text-sm text-gray-300">{{ $item }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            {{ __('modal_about.skills.title1') }} <span class="text-[#4169E1]">{{ __('modal_about.skills.title2') }}</span>
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

    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            {{ __('modal_about.education_timeline.title1') }} <span class="text-[#4169E1]">{{ __('modal_about.education_timeline.title2') }}</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="space-y-6 relative border-l-2 border-gray-600 ml-3 pl-6">
        @foreach (Lang::get('modal_about.education_timeline.content') as $item)
            <div class="relative">
                <div class="absolute -left-[30px] top-1 w-4 h-4 bg-[#4169E1] rounded-full border-2 border-gray-800"></div>
                <p class="text-xs text-gray-400">{{ $item['year'] }}</p>
                <h4 class="text-md font-semibold text-white">{{ $item['title'] }}</h4>
                <p class="text-xs text-gray-300 italic">{{ $item['institution'] }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <div>
        <h3 class="text-xl lg:text-2xl uppercase font-poppins text-white mb-3">
            {{ __('modal_about.working_timeline.title1') }} <span class="text-[#4169E1]">{{ __('modal_about.working_timeline.title2') }}</span>
        </h3>
        <hr class="border-gray-700 mb-6">
        <div class="space-y-6 relative border-l-2 border-gray-600 ml-3 pl-6">
             @foreach (Lang::get('modal_about.working_timeline.content') as $item)
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
