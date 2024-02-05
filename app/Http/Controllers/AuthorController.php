<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->header('Accept-Language', 'en');

        $authorWithFilteredInfo = Author::with(['authorInfo' => function ($query) use ($language) {
            $query->where('language', $language);
        }])->get();

        return response($authorWithFilteredInfo);
    }


    public function show(Request $request, $authorId)
    {
        $language = $request->header('Accept-Language', 'en');

        $authorWithFilteredInfo = Author::with(['authorInfo' => function ($query) use ($language) {
            $query->where('language', $language);
        }])->find($authorId);

        return response()->json($authorWithFilteredInfo);
    }
}
