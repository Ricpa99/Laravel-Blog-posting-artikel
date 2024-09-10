<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(2,3)),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => fake()->slug(rand(1,2)),
            'body' => fake()->paragraph(rand(1,2)),
        ];
    }
}
