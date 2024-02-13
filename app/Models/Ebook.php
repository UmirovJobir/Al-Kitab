<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ebook extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['discounted_price', 'sold_count'];


    public function soldCounts()
    {
        return $this->hasMany(SoldCount::class, 'book_id')->where('type', 'ebook');
    }

    public function getSoldCountAttribute()
    {
        return $this->soldCounts()->sum('quantity');
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function ebookContent(): HasMany
    {
        return $this->hasMany(EbookContent::class, 'ebook_id');
    }
}
