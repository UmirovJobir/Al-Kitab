<?php

namespace App\Http\Controllers;

use App\Http\Filters\PbookFilter;
use App\Http\Traits\AuthApi;
use App\Models\Book;
use App\Models\Category;
use App\Models\Ebook;
use Auth_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;



class BookController extends Controller
{
    use AuthApi;

    public function index(PbookFilter $filter)
    {
        $books = Book::filter($filter)->with('categories:id,name', 'bookImages', 'pbook', 'ebook')->get();
        return response($books);
    }

    public function show(Category $category, $book)
    {
        if (request()->has('access_token')) {
            $accessToken =  request()->get('access_token');

            $userInfo = Cache::has('user_info' . $accessToken) ? Cache::get('user_info' . $accessToken) : $this->getUserInfo($accessToken);

            dd($userInfo);
        };
        $bookData = Book::with('bookImages', 'pbook', 'ebook')->find($book);
        return response($bookData);
    }
}
