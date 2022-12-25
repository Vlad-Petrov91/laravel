<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use App\Services\XMLParserService;


class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $links = [
            'https://lenta.ru/rss',
            'https://news.rambler.ru/rss/holiday/'
        ];

        foreach ($links as $link) {
            NewsParsing::dispatch($link);
        }

        return view('admin.index')->with('news', News::paginate(10));
    }
}
