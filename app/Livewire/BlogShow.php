<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.blog')]
class BlogShow extends Component
{
    public Blog $blogPost;

    public string $title = '';
    public string $metaDescription = '';
    public string $metaKeywords = '';
    public string $ogTitle = '';
    public string $ogDescription = '';
    public string $ogType = 'article';
    public string $ogImage = '';
    public ?string $articlePublishedTime = null;
    public ?string $articleModifiedTime = null;

    public function mount(Blog $blog)
    {
        $this->blogPost = $blog;

        if ($this->blogPost->status !== 'published' || ($this->blogPost->published_at && $this->blogPost->published_at->isFuture())) {
        }

        $this->title = $this->blogPost->meta_title ?: $this->blogPost->title;
        $this->metaDescription = $this->blogPost->meta_description ?: Str::limit(strip_tags($this->blogPost->excerpt ?: $this->blogPost->content), 155);

        $this->ogTitle = $this->title;
        $this->ogDescription = $this->metaDescription;
        $this->ogImage = $this->blogPost->cover_image_path ? asset('images/' . $this->blogPost->cover_image_path) : asset('images/default_og_image.png');
        $this->articlePublishedTime = $this->blogPost->published_at ? $this->blogPost->published_at->toIso8601String() : null;
        $this->articleModifiedTime = $this->blogPost->updated_at->toIso8601String();
    }

    public function render()
    {
        return view('livewire.blog-show', [
            'post' => $this->blogPost,
        ]);
    }
}
