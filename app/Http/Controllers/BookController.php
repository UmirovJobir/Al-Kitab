<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
//        $authorWithFilteredInfo = Book::with('bookImages')->get();

        $language = $request->header('Accept-Language', 'en');

        $authorWithFilteredInfo = Book::where('language', $language)->with('bookImages')->get();

        return response($authorWithFilteredInfo);
    }
}
