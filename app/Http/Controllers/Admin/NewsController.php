<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(7);

        return view('admin.index')->with('news', $news);
    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {
            $news->fill($request->all());
            $news->is_private = isset($request->is_private);
            $news->save();
            $newsSlug = Category::where('id', $request->category_id)->value('slug');
            return redirect()->route('news.newsItem', ['slug' => $newsSlug, $news])->with('success', 'Новость успешно добавлена');
        }

        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(News $news)
    {
    }

    public function edit(News $news, Category $category)
    {
        return view('admin.create')->with([
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $news->fill($request->all());
        $news->save();
        return redirect()->route('admin.index')->with('success', 'Новость изменена успешно');
    }

    public function destroy(News $news)
    {
        dd($news);
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость удалена успешно');
    }
}
