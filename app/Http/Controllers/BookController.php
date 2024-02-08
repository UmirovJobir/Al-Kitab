<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->query('language');
        $category_id = $request->query('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort_by_exp = $request->query('sort_by_exp');
        $sort_by_rating = $request->query('sort_by_rating');
        $discount = $request->query('discount');

        // Start with base query
        $query = Book::query();

        if ($category_id != null) {
            $query->whereHas('categories', function ($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            });
        }

        //filter by price range
        if ($minPrice and $maxPrice) {
            $query->whereHas('pbook', function ($query) use ($minPrice, $maxPrice) {
                $query->whereBetween('price', [$minPrice, $maxPrice]);
            });
        } elseif ($minPrice) {
            $query->whereHas('pbook', function ($query) use ($minPrice) {
                $query->where('price', '>=', $minPrice);
            });
        } elseif ($maxPrice) {
            $query->whereHas('pbook', function ($query) use ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            });
        }

        // Filter by language
        if ($language != null) {
            $query->where('language', $language);
        }

        // Sorting by expensive price of related Pbooks
        if ($sort_by_exp == 'true') {
            $query->leftJoin('pbooks', 'books.id', '=', 'pbooks.id')
                ->orderBy('pbooks.price', 'desc')
                ->select('books.*');
        }

        // Sorting by rating of related Pbooks
        if ($sort_by_rating == 'true') {
            $query->orderBy('rating', 'desc');
        }

        // Filter by discount
        if ($discount == 'true') {
            $query->whereHas('pbook', function ($query) {
                $query->where('discount', '>', 0);
            });
        }

        $books = $query->with('categories:id,name', 'bookImages', 'pbook', 'ebook')->get();
//        $books = $query->with('pbook')->get();

        return response($books);

    }

    public function show(Category $category, $book)
    {
        $bookData = Book::with('bookImages', 'pbook', 'ebook')->find($book);
        return response($bookData);
    }
}
