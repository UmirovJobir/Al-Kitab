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
        $books = Book::filter($filter)
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


    public function show(Category $category, $book, Request $request)
    {
//        if (request()->has('access_token')) {
//            $accessToken =  request()->get('access_token');
//
//            $userInfo = Cache::has('user_info' . $accessToken) ? Cache::get('user_info' . $accessToken) : $this->getUserInfo($accessToken);
//
//            dd($userInfo);
//        };

        $language = $request->header('Accept-Language', 'uz');

        $bookData = Book::with([
            'author.authorInfo' => function ($query) use ($language) {
                    $query->where('language', $language);
            },
            'bookImages', 'pbook', 'ebook',
            ])
            ->find($book);
        return response($bookData);
    }
}
