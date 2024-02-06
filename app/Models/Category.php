<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $hidden = ['pivot'];

    public function subcategory(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subcategories()
    {
        return $this->subcategory()->with('subcategories');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
