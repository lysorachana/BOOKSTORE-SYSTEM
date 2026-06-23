<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetail;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $authors = Author::factory()->count(5)->create();
        $categories = Category::factory()->count(5)->create();

        for ($i = 0; $i < 5; $i++) {
            $book = Book::factory()->create([
                'author_id' => $authors->random()->id,
                'category_id' => $categories->random()->id,
            ]);

            BookDetail::factory()->create([
                'book_id' => $book->id,
            ]);
        }
    }
} 
