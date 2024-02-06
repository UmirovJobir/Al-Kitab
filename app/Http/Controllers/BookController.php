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
        $language = $request->header('Accept-Language', 'en');

        $books = Book::where('language', $language)
                        ->with('categories:id,name', 'bookImages','pbook', 'ebook')
                        ->get();

        return response($books);
    }

    public function getBooks(Category $category, Request $request)
    {
        $language = $request->query('language');

        $query = Book::whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        });

        if ($language !== null) {
            $query->where('language', $language);
        }

        $books = $query->with('categories:id,name', 'bookImages', 'pbook', 'ebook')->get();

        return response($books);

    }
}
