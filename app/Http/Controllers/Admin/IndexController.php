<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, Category $category, News $news)
    {
        if ($request->isMethod('post')) {
            $newsArray = $news->getNews();
            $createdNewsId = array_key_last($newsArray) + 1;
            $newsSlug = $category->getCategorySlugById($request->input('category_id'));
            $newsArray[] = [
                'id' => $createdNewsId,
                'category_id' => (int)$request->category_id,
                'title' => $request->title,
                'text' => $request->text,
                'slug' => $newsSlug,
                'is_private' => $request->has('is_private'),
            ];
            Storage::disk('local')->put('news.json', json_encode($newsArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return redirect()->route('news.newsItem', ['slug' => $newsSlug,'id' => $createdNewsId]);
        }

        return view('admin.create', ['categories' => $category->getCategories()]);
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
