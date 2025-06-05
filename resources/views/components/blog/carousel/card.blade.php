@props([
    'post'
])
<div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden group transition-all duration-300 ease-in-out h-full flex flex-col">
    <div class="aspect-square overflow-hidden relative">
        <img src="{{ $post->cover_image_path ? asset('storage/' . $post->cover_image_path) : asset('images/placeholder.jpg') }}"
             alt="Imagem do post{{ $post->title }}"
             class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105">

        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
        </div>

        <a href="{{ route('blog.show', $post->slug) }}"
           class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out"
           aria-label="Ver detalhes do post{{ $post->title }}">

            <h3 class="text-lg font-poppins font-semibold text-white mb-1">{{ $post->title }}</h3>
            <p class="text-sm text-gray-200 mb-3">{{ $post->category_name }}</p>

            <span class=" bg-[#4169E1] text-white font-semibold py-2 px-5 rounded-full text-xs shadow-md hover:text-black hover:bg-gray-200 transition-colors">
                Ver Post
            </span>
        </a>
    </div>
</div>
