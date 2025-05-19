<div>
    <section class="bg-black text-white py-14 lg:py-10">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-poppins font-bold text-start mb-2 lg:mb-4">
                Últimos <span class="text-[#4169E1]">Posts</span>
            </h2>
            <hr class="py-2 mb-6 border-dashed border-gray-900">

            @if($blogPosts && $blogPosts->isNotEmpty())
                <div x-data="carousel()" x-init="initSplide()" class="relative">
                    <div class="splide" id="projects-carousel">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($blogPosts as $post)
                                <li class="splide__slide">
                                    <x-blog.carousel.card :post="$post"/>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <p>Nada a ser exibido.</p>
            @endif
        </div>
    </section>

    <script>
        function carousel() {
            return {
                splideInstance: null,
                initSplide() {
                    this.$nextTick(() => {
                        const splideEl = document.getElementById('projects-carousel');
                        if (splideEl) {
                           this.splideInstance = new Splide(splideEl, {
                                type       : 'slide',
                                perPage    : 3,
                                perMove    : 1,
                                gap        : '1rem',
                                pagination : true,
                                arrows     : true,
                                drag       : 'free',
                                snap       : true,
                                keyboard   : 'global',
                                breakpoints: {
                                    1024: { // lg
                                        perPage: 2,
                                        gap: '1rem',
                                    },
                                    768: { // md
                                        perPage: 1,
                                        gap: '1rem',
                                        arrows: true,
                                    },
                                    640: { // sm
                                        perPage: 1,
                                        gap: '0.75rem',
                                    }
                                }
                            }).mount();
                        }
                    });
                }
            }
        }
    </script>
</div>
