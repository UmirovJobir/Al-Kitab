<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookImage;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function get($category, $book)
    {
        $bookData = Book::with('bookImage', 'ebookWithContent')->find($book);
        return response($bookData);
    }
}
