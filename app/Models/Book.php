<?php

namespace App\Models;

use App\Concerns\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;
    use Filterable;

    protected $hidden = ['pivot', 'created_at', 'updated_at', 'author_id'];
    protected $keyType = 'string';


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function bookImage()
    {
        return $this->hasOne(BookImage::class, 'book_id')->orderBy('order');
    }

    public function bookImages(): HasMany
    {
        return $this->hasMany(BookImage::class, 'book_id');
    }

    public function pbook(): HasOne
    {
        return $this->hasOne(Pbook::class, 'id');
    }

    public function ebook(): HasOne
    {
        return $this->hasOne(Ebook::class, 'id');
    }

    public function ebookWithContent(): HasOne
    {
        return $this->hasOne(Ebook::class, 'id')->with('ebookContent');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
