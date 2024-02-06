<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    protected $keyType = 'string';

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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
