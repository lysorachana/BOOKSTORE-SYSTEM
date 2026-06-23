<?php

namespace Database\Factories;

use App\Models\BookDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookDetail>
 */
class BookDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => \App\Models\Book::factory(),
            'publisher' => $this->faker->company(),
            'language' => $this->faker->languageCode(),
            'page_count' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
