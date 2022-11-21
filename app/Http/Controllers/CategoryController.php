<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($slug)
    {
        $category = DB::table('categories')->where('slug', $slug)->value('name');
        $categoryId = DB::table('categories')->where('slug', $slug)->value('id');
        $news = DB::table('news')->where('category_id', $categoryId)->get();
        return view('news.categoryNews')
            ->with('news', $news)
            ->with('category', $category)
            ->with('slug', $slug);
    }
}

