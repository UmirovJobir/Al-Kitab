<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', '=', null)->with('subcategories')->get();
        return response($categories);
    }


    public function show(Category $category)
    {
        $category->load('subcategories');
        return response($category);
    }
}
