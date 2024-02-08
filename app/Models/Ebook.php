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

    public function ebookContent(): HasMany
    {
        return $this->hasMany(EbookContent::class, 'ebook_id');
    }
}
