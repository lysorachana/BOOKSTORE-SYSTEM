<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Book;

class BookDetail extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'publisher', 'language', 'page_count'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
