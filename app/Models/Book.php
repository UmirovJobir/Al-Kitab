<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public function bookImages(): HasMany
    {
        return $this->hasMany(BookImage::class, 'book_id');
    }
}
