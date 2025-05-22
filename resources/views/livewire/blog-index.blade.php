<div>
    <section class="py-12 sm:py-16 lg:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl lg:max-w-5xl">

            <div class="mb-12 lg:mb-16 text-center lg:text-start">
                <h1 class="text-4xl lg:text-5xl font-poppins font-extrabold text-gray-900 dark:text-white leading-tight">
                    {{ __('blog.index_main_title1') }}
                    <span class="text-[#4169E1] dark:text-blue-400">{{ __('blog.index_main_title2') }}</span>
                </h1>
                <p class="mt-3 text-lg text-gray-500 dark:text-gray-400 font-mulish">
                    {{ __('blog.index_subtitle') }}
                </p>
                <hr class="mt-6 border-gray-200 dark:border-gray-700">
            </div>

            @if($posts && $posts->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-10 lg:gap-12 xl:gap-16">
                    @foreach($posts as $post)
                        <article wire:key="post-preview-{{ $post->id }}"
                                 class="bg-white dark:bg-gray-800 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out overflow-hidden flex flex-col md:flex-row group">

                            @if($post->cover_image_path)
                                <div class="md:w-2/5 lg:w-1/3 flex-shrink-0">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="block h-56 md:h-full aspect-video md:aspect-auto">
                                        <img src="{{ asset('images/' . $post->cover_image_path) }}" alt="{{ $post->title }}"
                                             class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                                    </a>
                                </div>
                            @endif

                            <div class="p-6 md:p-8 flex flex-col justify-between flex-grow {{ $post->cover_image_path ? 'md:w-3/5 lg:w-2/3' : 'w-full' }}">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 font-mulish mb-2">
                                        <time datetime="{{ $post->published_at ? $post->published_at->toDateString() : '' }}">
                                            Publicado em {{ $post->published_at ? $post->published_at->isoFormat('D [de] MMMM [de] YYYY') : 'N/A' }}
                                        </time>
                                    </p>
                                    <h3 class="text-xl lg:text-2xl font-poppins font-semibold text-gray-900 dark:text-white mb-3 leading-tight">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="group-hover:text-[#4169E1] dark:group-hover:text-blue-400 transition-colors">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <div class="prose prose-sm dark:prose-invert text-gray-600 dark:text-gray-300 font-mulish leading-relaxed mb-4 max-w-none">
                                        {!! Str::markdown(Str::limit(strip_tags($post->excerpt ?: $post->content), 180)) !!}
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                       class="inline-flex items-center text-sm font-semibold text-[#4169E1] dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors group">
                                        Leia mais
                                        <svg class="ml-1.5 w-4 h-4 transform transition-transform duration-200 ease-in-out group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-16 lg:mt-20">
                    {{ $posts->links() }}
                </div>

            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('blog.no_posts_title') }}</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('blog.no_posts_message') }}
                    </p>
                </div>
            @endif
        </div>
    </section>
</div>
