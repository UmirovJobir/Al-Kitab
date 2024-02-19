<?php

namespace App\Http\Controllers;

use App\Http\Filters\EbookFilter;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EbookController extends Controller
{
    public function index(EbookFilter $filter)
    {
        $bookData = Book::whereHas('ebook')
            ->filter($filter)
            ->with([
                'categories:id,name',
                'bookImage',
                'ebook'
            ])->get();
        return response($bookData);
    }

    public function show($ebook, Request $request)
    {
        $query = Ebook::find($ebook);

        if ($query==null) {
            return response()->json(['error' => 'Abook not found.'], Response::HTTP_NOT_FOUND);
        }else {
            $language = $request->header('Accept-Language', 'uz');

            $bookData = Book::with([
                'author.authorInfo' => function ($query) use ($language) {
                    $query->where('language', $language);
                },
                'bookImages',
                'ebook.ebookContent'
            ])
                ->find($ebook);
            return response($bookData);
        }
    }
}
