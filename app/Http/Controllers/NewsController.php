<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class  NewsController extends Controller
{
    public function index(News $news)
    {
        return view('news.index')->with('news', $news->getNews());
    }

    public function getNewsItem($id, News $news)
    {
        return view('news.newsItem')->with('news', $news->getNewsItem($id));
    }
}
