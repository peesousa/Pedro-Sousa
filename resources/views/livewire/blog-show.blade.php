<div>
    <article class="py-16 lg:py-24">
        <div class="container mx-auto px-4 max-w-3xl">
            @if($post->cover_image_path)
                <div class="aspect-[16/9] md:aspect-[2/1] rounded-lg overflow-hidden mb-8 shadow-lg">
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                </div>
            @endif

            <h1 class="text-3xl lg:text-4xl xl:text-5xl font-poppins font-bold text-black mb-4 leading-tight">
                {{ $post->title }}
            </h1>

            <p class="text-sm text-black font-mulish mb-8">
                publicado em {{ $post->published_at ? $post->published_at->isoFormat('LLLL') : 'N/A' }}
            </p>

            <div class="prose prose-lg lg:prose-xl prose-invert max-w-none text-black font-mulish leading-relaxed">
                {!! Str::markdown($post->content) !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href="{{ route('blog.index') }}" class="text-[#4169E1] hover:text-white font-semibold transition-colors text-sm">
                    &larr; Voltar para a página inicial
                </a>
                <div class="flex space-x-3">
                    <span class="text-sm text-black">Compartilhar</span>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-[#4169E1]" title="Compartilhar no LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </article>
</div>
