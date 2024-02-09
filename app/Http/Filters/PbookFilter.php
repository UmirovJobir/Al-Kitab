<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class PbookFilter extends Filter
{
    /**
     * Filter the products by the given string.
     *
     * @param  string|null  $value
     * @return Builder
     */
    public function keywords(string $value = null): Builder
    {
        return $this->builder->where('name', 'like', "{$value}%");
    }

    /**
     * Filter the products by the given status.
     *
     * @param  string|null  $value
     * @return Builder
     */
    public function status(string $value = null): Builder
    {
        return $this->builder->where('status', $value);
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return Builder
     */
    public function category(string $value = null): Builder
    {
        return $this->builder->whereHas('categories', function ($query) use ($value) {
                $query->whereIn('categories.id', explode(',', $value));
            });
    }

    /**
     * Sort the products by the given order and field.
     *
     * @param  array  $value
     * @return Builder
     */
    public function sort(string $value): Builder
    {
        if (isset($value) && ! Schema::hasColumn('pbooks', $value)) {
            if (Schema::hasColumn('pbooks', $value))
            return $this->builder;
        }

        return $this->builder->leftJoin('pbooks', 'books.id', '=', 'pbooks.id')
                ->orderBy('pbooks.'.$value, 'desc')
                ->select('books.*');
    }
}
