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
}
