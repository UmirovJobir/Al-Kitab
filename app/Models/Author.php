<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = ['book_count'];


    public function authorInfo(): HasOne
    {
        return $this->hasOne(AuthorInfo::class, 'author_id');
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'author_id');
    }

    public function getBookCountAttribute(): int
    {
        return $this->books()->count();
    }

}
