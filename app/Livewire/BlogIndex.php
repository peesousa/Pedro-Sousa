<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.blog')]
#[Title('Blog - Minha Trajetória em Desenvolvimento')]
class BlogIndex extends Component
{
    public string $metaDescription;
    public string $metaKeywords;
    public string $ogType;
    public string $ogImage;
    public string $ogTitle;

    public function mount()
    {
        $this->metaDescription = __('blog.index_meta_description');
        $this->metaKeywords = __('blog.index_meta_keywords');
        $this->ogType = 'website';
        $this->ogImage = asset('images/blog_default_og.png');
        $this->ogTitle = __('blog.index_og_title');
    }
    public function render()
    {
        $posts = Blog::where('status', 'published')
                       ->whereNotNull('published_at')
                       ->where('published_at', '<=', now())
                       ->orderBy('published_at', 'desc')
                       ->paginate(5);

        return view('livewire.blog-index', [
            'posts' => $posts,
        ]);
    }
}
