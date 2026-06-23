<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            // 'author' => fake()->name(),
            'author_id' => \App\Models\Author::factory(),
            'category_id' => \App\Models\Category::factory(),
            'price' => fake()->randomFloat(2, 5, 100),
            'description' => fake()->paragraph(),
        ];
    }
}
