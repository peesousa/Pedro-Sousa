<?php

use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\Home;
use App\Livewire\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/about', About::class)->name('about');

Route::get('/projects', Project::class)->name('portfolio');

Route::get('/blog', Blog::class)->name('blog');

Route::get('/contact', Contact::class)->name('contact');
