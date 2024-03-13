<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public function orderPayment(): HasOne
    {
        return $this->hasOne(OrderPayment::class, 'order_id');
    }
}
