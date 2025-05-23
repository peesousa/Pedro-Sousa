<div>
    <form wire:submit.prevent="submitForm" class="space-y-4">
        @if ($successMessage)
            <div class="p-2.5 text-xs text-green-200 bg-green-700 bg-opacity-30 rounded-md" role="alert">
                {{ $successMessage }}
            </div>
        @endif
        @if ($errorMessage)
            <div class="p-2.5 text-xs text-red-200 bg-red-700 bg-opacity-30 rounded-md" role="alert">
                {{ $errorMessage }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:gap-x-8">
            <div class="flex-1 md:w-1/2 mb-4 md:mb-5">
                <div class="flex items-center">
                    <input placeholder="Nome" type="text" wire:model.defer="name" id="name" autocomplete="name"
                           class="block w-full bg-gray-700 border-gray-600 text-white rounded-lg shadow-sm p-4 focus:outline-none focus:ring-1 focus:ring-[#4169E1] focus:border-[#4169E1] text-sm @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class="relative group ml-2 shrink-0">
                            <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            <div class="absolute z-10 hidden group-hover:block bg-red-700 text-white text-xs rounded px-2 py-1 bottom-full left-1/2 -translate-x-1/2 mb-1 whitespace-nowrap shadow-md min-w-max">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="flex-1 md:w-1/2">
                <div class="flex items-center">
                    <input placeholder="Email" type="email" wire:model.defer="email" id="email" autocomplete="email"
                           class="block w-full bg-gray-700 border-gray-600 text-white rounded-lg shadow-sm p-4 focus:outline-none focus:ring-1 focus:ring-[#4169E1] focus:border-[#4169E1] text-sm @error('email') border-red-500 @enderror">
                    @error('email')
                        <div class="relative group ml-2 shrink-0">
                             <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            <div class="absolute z-10 hidden group-hover:block bg-red-700 text-white text-xs rounded px-2 py-1 bottom-full left-1/2 -translate-x-1/2 mb-1 whitespace-nowrap shadow-md min-w-max">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div>
            <div class="flex items-start">
                <textarea placeholder="Mensagem" wire:model.defer="message" id="message" rows="5"
                          class="block w-full bg-gray-700 border-gray-600 text-white rounded-lg shadow-sm p-4 focus:outline-none focus:ring-1 focus:ring-[#4169E1] focus:border-[#4169E1] text-sm resize-none @error('message') border-red-500 @enderror"></textarea>
                @error('message')
                    <div class="relative group ml-2 mt-1 shrink-0">
                         <svg class="w-4 h-4 text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        <div class="absolute z-10 hidden group-hover:block bg-red-700 text-white text-xs rounded px-2 py-1 bottom-full left-1/2 -translate-x-1/2 mb-1 whitespace-nowrap shadow-md min-w-max">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
        </div>

        <div class="flex justify-start text-center mt-8 md:text-right">
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submitForm"
                    class="w-full md:w-auto inline-flex justify-center items-center py-3.5 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-[#4169E1] hover:bg-opacity-85 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#4169E1] focus:ring-offset-gray-900 transition-colors duration-300 disabled:opacity-60">
                <span wire:loading.remove wire:target="submitForm">{{ __('pages.contact.button_send') }}</span>
                <span wire:loading wire:target="submitForm" class="flex items-center">
                     <svg class="animate-spin -ml-1 mr-1 h-1 w-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Enviando...
                </span>
            </button>
        </div>
    </form>
</div>
