<section class="bg-black text-white py-16 lg:py-24 ">
    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 items-start gap-x-12 lg:gap-x-16">

            <div class="col-span-2 flex justify-center lg:justify-start">
                <img src="{{ asset('images/eu.jpeg') }}"
                        alt="Foto de Pedro Sousa"
                        class="rounded-lg w-[280px] h-[280px] sm:w-[300px] sm:h-[300px] object-cover shadow-2xl">
            </div>

            <div class="lg:col-span-3 w-full text-center lg:text-left" x-data="{ showModal: false }">
                <h1 class="uppercase font-poppins text-3xl sm:text-4xl font-bold text-white mb-2">
                    Pedro <span class="text-[#4169E1]">Sousa</span>
                </h1>
                <hr class="my-4 border-dotted border-gray-400">
                <div class="prose prose-lg lg:prose-xl prose-invert text-gray-300 font-mulish leading-relaxed max-w-none">
                    <p>
                        {{ __('pages.about.summary') }}
                    </p>
                </div>

                <div class="mt-8">
                    <button @click="showModal = true"
                            type="button"
                            class="inline-block bg-[#4169E1] text-white font-poppins font-semibold no-underline rounded-full py-3 px-10
                                    hover:bg-white hover:text-[#4169E1] transition-all duration-300 ease-in-out transform cursor-pointer
                                    focus:outline-none focus:ring-2 focus:ring-[#4169E1] focus:ring-opacity-50">
                        {{ __('pages.about.button') }}
                    </button>
                </div>

                <x-modal-about.main x-show="showModal" @close-modal.window="showModal = false" @keydown.escape.window="showModal = false" />
            </div>
        </div>
    </div>
</section>
