<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Abook extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $keyType = 'string';


    public function abookAudio(): HasMany
    {
        return $this->hasMany(AbookAudio::class, 'abook_id'); #->select('id', 'title', 'content');
    }
}
