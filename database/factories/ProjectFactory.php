<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category_name' => $this->faker->randomElement(['Web Design', 'Laravel', 'TALL Stack', 'Mobile App']),
            'image_path' => 'portfolio/placeholder' . $this->faker->numberBetween(1, 6) . '.jpg',
            'short_description' => $this->faker->paragraph(2),
            'full_description' => $this->faker->paragraph(10),
            'technologies_used' => implode(', ', $this->faker->words(5)),
            'project_date' => $this->faker->date(),
            'is_featured' => $this->faker->boolean(25),
            'sort_order' => $this->faker->numberBetween(0, 10),
            'status' => 'published',
        ];
    }
}
