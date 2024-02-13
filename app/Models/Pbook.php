<?php

namespace App\Models;

use App\Concerns\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbook extends Model
{
    use HasFactory;
    use Filterable;

    protected $keyType = 'string';
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['discounted_price', 'sold_count'];


    public function soldCounts()
    {
        return $this->hasMany(SoldCount::class, 'book_id')->where('type', 'pbook');
    }

    public function getSoldCountAttribute()
    {
        return $this->soldCounts()->sum('quantity');
    }

    public function getDiscountedPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }
}
