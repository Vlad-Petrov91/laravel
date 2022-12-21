<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  NewsController extends Controller
{
    public function index()
    {
        // TO DO   get, first, join и where
        $news = News::query()
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.slug')
            ->paginate(10);

        return view('news.index')->with('news', $news);
    }

    public function getNewsItem($slug, News $news)
    {
        // $oneNews = DB::table('news')->where('id', $id)->first();
        return view('news.newsItem')->with('news', $news);
    }
}
