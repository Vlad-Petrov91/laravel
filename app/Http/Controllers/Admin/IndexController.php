<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
    {
        $category = DB::table('categories')->get();

        if ($request->isMethod('post')) {
            $createdNews = [
                'category_id' => (int)$request->category_id,
                'title' => $request->title,
                'text' => $request->text,
                'is_private' => $request->has('is_private'),
            ];

            DB::table('news')->insert($createdNews);
            $id = DB::table('news')->max('id');
            $newsSlug = DB::table('categories')->where('id', (int)$request->category_id)->value('slug');
            return redirect()->route('news.newsItem', ['slug' => $newsSlug, 'id' => $id])->with('success', 'Новость успешно добавлена');
        }

        return view('admin.create', ['categories' => $category]);
    }

    public function downloadImage()
    {
        return response()->download('1.jpg');
        //  return view('admin.download');
    }

    public function downloadText(News $news)
    {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
