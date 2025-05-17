<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'cover_image_path' => 'portfolio/placeholder' . $this->faker->numberBetween(1, 6) . '.jpg',
            'excerpt' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraph(30),
            'published_at' => $this->faker->date(),
            'status' => 'published',
            'meta_title' => $this->faker->paragraph(2),
            'meta_description' => $this->faker->paragraph(2),
        ];
    }
}
