<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookDetail;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;
protected $fillable = [
        'title',
        // 'author', 
        'author_id',
        'price',
        'qty',
        'description',
        'category_id',
        'cover_image',
    ];

    public function bookDetail()
    {
        return $this->hasOne(BookDetail::class);
    }

    public function authorData()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }
}
