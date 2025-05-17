<div x-cloak
     x-show="showModal"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 md:p-8 bg-black/95 backdrop-blur-sm"
     aria-labelledby="modal-title-{{ uniqid() }}"
     role="dialog"
     aria-modal="true">

<div x-show="showModal"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     @click.outside="showModal = false"
     class="relative bg-gray-800/95 text-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col backdrop-blur-md">

    <button @click="showModal = false; $dispatch('close-modal')"
            type="button"
            class="absolute top-3 right-3 z-20 p-2 text-gray-400 rounded-full hover:text-white hover:bg-gray-700/70 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
        <span class="sr-only">Fechar modal</span>
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

    <div class="px-6 pt-5 pb-3 flex-shrink-0">
    </div>

    <div class="flex-grow overflow-y-auto px-8 pb-6">
        <div class="flex flex-col lg:flex-row gap-x-8 lg:gap-x-10">
            <div class="w-full lg:w-1/3 lg:sticky lg:top-0 self-start pt-1">
                @include('components.modal-about.sidebar')
            </div>
            <div class="w-full lg:w-2/3 mt-6 lg:mt-0">
                @include('components.modal-about.content')
            </div>
        </div>
    </div>
</div>
</div>

