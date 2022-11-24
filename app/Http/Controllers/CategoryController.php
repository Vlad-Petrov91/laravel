<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($slug, News $news, Category $category)
    {
        $category = Category::where('slug', $slug)->value('name');
        $categoryId = Category::query()->where('slug', $slug)->value('id');

        $news = Category::find($categoryId)->news();

        return view('news.categoryNews')
            ->with('news', $news)
            ->with('category', $category)
            ->with('slug', $slug);
    }
}

