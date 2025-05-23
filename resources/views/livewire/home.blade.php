<div>
    <div class="flex flex-col mt-40 items-center justify-center">

            <h1 class="text-white text-6xl font-extrabold uppercase">Pedro <span class="text-[#4169e1]">Sousa</span></h1>
            <h2 class="text-gray-400 text-2xl font-bold uppercase mt-3">
                @if(App::getLocale() === 'pt_BR')
                    {{ __('pages.home.job_title') }}
                    <span>{{ __('pages.home.stack_focus') }}</span>
                @else
                    {{ __('pages.home.stack_focus') }}
                    <span>{{ __('pages.home.job_title') }}</span>
                @endif
            </h2>
        <div>
            <a href="{{ route('contact') }}"
                class="inline-block bg-[#4169E1] text-white font-poppins font-semibold no-underline rounded-full py-3 px-8 mt-10
                        hover:bg-white hover:text-black transition-colors duration-300 ease-in-out
                        focus:outline-none focus:ring-2 focus:ring-[#4169E1] focus:ring-opacity-50">
                {{ __('pages.home.contact_button') }}
            </a>
        </div>
    </div>
</div>
