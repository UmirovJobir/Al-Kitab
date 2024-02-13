<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorInfo extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'author_id', 'created_at', 'updated_at'];
}
