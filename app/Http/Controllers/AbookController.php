<?php

namespace App\Http\Controllers;

use App\Http\Filters\AbookFilter;
use App\Models\Abook;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AbookController extends Controller
{
    public function index(AbookFilter $filter)
    {
        $bookData = Book::whereHas('ebook')
            ->filter($filter)
            ->with([
                'categories:id,name',
                'bookImage',
                'abook'
            ])->get();
        return response($bookData);
    }

    public function show($abook, Request $request)
    {
        $query = Abook::find($abook);

        if ($query==null) {
            return response()->json(['error' => 'Abook not found.'], Response::HTTP_NOT_FOUND);
        }else{
            $bookData = Book::with([
                'bookImages',
                'abook.abookAudio'
            ])->find($abook);
            return response($bookData);
        }
    }
}
