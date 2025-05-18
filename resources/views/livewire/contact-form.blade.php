<div>
    <form wire:submit.prevent="submitForm" class="space-y-2">
        @if ($successMessage)
            <div class="p-3 text-xs text-green-700 bg-green-100 rounded-md" role="alert">
                {{ $successMessage }}
            </div>
        @endif
        @if ($errorMessage)
            <div class="p-3 text-xs text-red-700 bg-red-100 rounded-md" role="alert">
                {{ $errorMessage }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:gap-x-4">
            {{-- Name --}}
            <div class="flex-1 md:w-1/2 mb-4 md:mb-0 relative">
                <label for="name" class="block text-xs font-medium text-gray-300">{{ __('pages.contact.formName') }}</label>
                <div class="flex items-center">
                    <input type="text" wire:model.defer="name" id="name" autocomplete="name"
                        class="mt-0.5 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm py-1.5 px-2.5 focus:outline-none focus:ring-[#4169E1] focus:border-[#4169E1] text-sm">
                    @error('name')
                        <div class="relative group ml-2 mt-0.5">
                            <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.25h1.5v1.5h-1.5v-1.5zm0-7.5h1.5v6h-1.5v-6z" />
                            </svg>
                            <div class="absolute z-10 hidden group-hover:block bg-red-600 text-white text-xs rounded px-2 py-1 left-6 top-0 whitespace-nowrap shadow-md">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="flex-1 md:w-1/2 relative">
                <label for="email" class="block text-xs font-medium text-gray-300">{{ __('pages.contact.formEmail') }}</label>
                <div class="flex items-center">
                    <input type="email" wire:model.defer="email" id="email" autocomplete="email"
                        class="mt-0.5 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm py-1.5 px-2.5 focus:outline-none focus:ring-[#4169E1] focus:border-[#4169E1] text-sm">
                    @error('email')
                        <div class="relative group ml-2 mt-0.5">
                            <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.25h1.5v1.5h-1.5v-1.5zm0-7.5h1.5v6h-1.5v-6z" />
                            </svg>
                            <div class="absolute z-10 hidden group-hover:block bg-red-600 text-white text-xs rounded px-2 py-1 left-6 top-0 whitespace-nowrap shadow-md">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Subject --}}
        <div class="relative">
            <label for="subject" class="block text-xs font-medium text-gray-300">{{ __('pages.contact.formSubject') }}</label>
            <div class="flex items-center">
                <input type="text" wire:model.defer="subject" id="subject"
                    class="mt-0.5 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm py-1.5 px-2.5 focus:outline-none focus:ring-[#4169E1] focus:border-[#4169E1] text-sm">
                @error('subject')
                    <div class="relative group ml-2 mt-0.5">
                        <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.25h1.5v1.5h-1.5v-1.5zm0-7.5h1.5v6h-1.5v-6z" />
                        </svg>
                        <div class="absolute z-10 hidden group-hover:block bg-red-600 text-white text-xs rounded px-2 py-1 left-6 top-0 whitespace-nowrap shadow-md">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
        </div>

        {{-- Message --}}
        <div class="relative">
            <label for="message" class="block text-xs font-medium text-gray-300">{{ __('pages.contact.formMessage') }}</label>
            <div class="flex items-start">
                <textarea wire:model.defer="message" id="message" rows="3"
                        class="mt-0.5 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm py-1.5 px-2.5 focus:outline-none focus:ring-[#4169E1] focus:border-[#4169E1] text-sm resize-none"></textarea>
                @error('message')
                    <div class="relative group ml-2 mt-0.5">
                        <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.25h1.5v1.5h-1.5v-1.5zm0-7.5h1.5v6h-1.5v-6z" />
                        </svg>
                        <div class="absolute z-10 hidden group-hover:block bg-red-600 text-white text-xs rounded px-2 py-1 left-6 top-0 whitespace-nowrap shadow-md">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
        </div>

        <div class="pt-2">
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submitForm"
                    class="inline-flex justify-center items-center py-2 px-6 border border-transparent shadow-sm text-xs font-medium rounded-full text-white bg-[#4169E1] hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4169E1] focus:ring-offset-gray-800 transition-colors w-full sm:w-auto">
                <span wire:loading.remove wire:target="submitForm">{{ __('pages.contact.button') }}</span>
                <span wire:loading wire:target="submitForm">enviando</span>
            </button>
        </div>
    </form>
</div>
