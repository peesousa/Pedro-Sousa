<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_name',
        'image_path',
        'short_description',
        'technologies_used',
        'project_date',
        'live_project_url',
        'repository_url',
        'is_featured',
        'short_order',
        'status',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'boolean'
    ];
}
