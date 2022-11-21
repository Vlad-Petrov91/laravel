<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.slug')
            ->get();
        return view('news.index')->with('news', $news);
    }

    public function getNewsItem($slug, $id)
    {
        $oneNews = DB::table('news')->where('id', $id)->first();
        return view('news.newsItem')->with('news', $oneNews);
    }
}
