<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\NoReturn;

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
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(News $news, Request $request)
    {

        $this->validate($request, $this->validateRules(), [], $this->attributeName());

        $news->fill($request->all());
        $news->is_private = isset($request->is_private);
        $news->save();
        $newsSlug = Category::where('id', $request->category_id)->value('slug');
        return redirect()->route('news.newsItem', ['slug' => $newsSlug, $news])->with('success', 'Новость успешно добавлена');
    }

    public function edit(News $news, Category $category)
    {
        return view('admin.create')->with([
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, News $news)
    {

        $this->validate($request, $this->validateRules(), [], $this->attributeName());

        $news->fill($request->all());
        $news->save();
        return redirect()->route('admin.news.index')->with('success', 'Новость изменена успешно');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена успешно');
    }

    protected function validateRules()
    {
        $tableNameCategory = (new Category())->getTable();

        return [
            'title' => 'required|min:3|max:40',
            'text' => 'required|min:3',
            'is_private' => 'sometimes|in:1',
            'category_id' => "required|exists:$tableNameCategory,id"
        ];
    }
    protected function attributeName()
    {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => 'Категория новости',
        ];
    }
}
