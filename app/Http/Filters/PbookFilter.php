<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class PbookFilter extends Filter
{
    /**
     * Filter the products by the given min_price.
     *
     * @param  string|null  $value
     * @return Builder
     */
    public function isFree(string $value): Builder
    {
        return $this->builder->whereHas('pbook', function ($query) use ($value) {
            $query->where('is_free', '=', $value);
        });
    }

    /**
     * Filter the products by the given min_price.
     *
     * @param  boolean|null  $value
     * @return Builder
     */
    public function discount(bool $value): Builder
    {
        return $this->builder->whereHas('pbook', function ($query) {
            $query->where('discount', '>', 0);
        });
    }

    /**
     * Filter the products by the given min_price.
     *
     * @param  int|null  $value
     * @return Builder
     */
    public function minPrice(int $value = null): Builder
    {
        return $this->builder->whereHas('pbook', function ($query) use ($value) {
                $query->where('price', '>=', $value);
            });
    }

    /**
     * Filter the products by the given max_price.
     *
     * @param  int|null  $value
     * @return Builder
     */
    public function maxPrice(int $value = null): Builder
    {
        return $this->builder->whereHas('pbook', function ($query) use ($value) {
                $query->where('price', '<=', $value);
            });
    }

    /**
     * Filter the products by the given language.
     *
     * @param  string|null  $value
     * @return Builder
     */
    public function language(string $value = null): Builder
    {
        return $this->builder->where('language', $value);
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
     * @param  string  $value
     * @return Builder
     */
    public function sort(string $value): Builder
    {
        if (!Schema::hasColumn('pbooks', $value)) {
            return $this->builder->orderBy($value, 'desc');
        }else {
            return $this->builder->leftJoin('pbooks', 'books.id', '=', 'pbooks.id')
                ->orderBy('pbooks.' . $value, 'desc')
                ->select('books.*');
        }
    }
}
