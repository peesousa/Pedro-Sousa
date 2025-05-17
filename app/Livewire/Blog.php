<?php

namespace App\Livewire;

use App\Enums\BlogStatus;
use App\Models\Blog as ModelsBlog;
use Livewire\Component;

class Blog extends Component
{
    public $blogPosts = [];

    public function mount() {
        $this->loadPosts();
    }

    public function loadPosts(){
        $this->blogPosts = ModelsBlog::where('status', BlogStatus::Published)
            ->orderBy('published_at', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.blog');
    }
}
