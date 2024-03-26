<?php

namespace App\Http\Controllers;

use App\Http\Filters\PbookFilter;
use App\Http\Traits\AuthApi;
use App\Models\Book;
use App\Models\Category;
use App\Models\Ebook;
use App\Models\Favourite;
use Auth_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;



class BookController extends Controller
{
    use AuthApi;

    public function index(PbookFilter $filter)
    {
        $books = Book::whereHas('pbook')
                    ->filter($filter)
                    ->select('id', 'name', 'description', 'is_available', 'rating')
                    ->with([
                        'categories:id,name',
                        'bookImage',
                        'pbook' => function ($query) {
                            $query->select('id', 'price');
                    }])
                    ->get();
        return response($books);
    }


    public function show($book, Request $request)
    {
        $language = $request->header('Accept-Language', 'uz');

        $bookData = Book::with([
            'author.authorInfo' => function ($query) use ($language) {
                    $query->where('language', $language);
            },
            'bookImages', 'pbook', 'ebook',
            ])
            ->find($book);
        $favorite = Favourite::where('book_id', $book)->exists();
        $bookData['favorite'] = $favorite;
        return response($bookData);
    }
}
