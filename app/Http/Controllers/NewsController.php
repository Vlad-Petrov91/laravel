<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class  NewsController extends Controller
{
    public function index()
    {
        $news = News::getNews();
        return view('news')->with('news', $news);
    }

    public function addNews()
    {
        return view('addNews');
    }

    public function getNewsItem($id)
    {
        $news = News::getNewsItem($id);
        if(is_null($news)) {
            return view('404');
        }
        return view('newsItem')->with('news', $news);
    }
}
