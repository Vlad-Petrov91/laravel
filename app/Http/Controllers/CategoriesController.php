<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::getCategories();
        return view('categories')->with('categories', $categories);
    }

    public function showCategoryNews($slug)
    {
        $categoryNews = Categories::getCategoryNews($slug);
        if(is_null($categoryNews)) {
            return view('404');
        }
        return view('categoryNews')->with('news', $categoryNews);
    }
}

