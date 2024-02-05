<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        $language = $request->header('Accept-Language', 'en');

        $authorWithFilteredInfo = Publisher::with(['publisherInfo' => function ($query) use ($language) {
            $query->where('language', $language);
        }])->get();

        return response($authorWithFilteredInfo);
    }
}
