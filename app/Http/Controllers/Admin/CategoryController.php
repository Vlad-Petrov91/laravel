<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriesRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories')->with('categories', $categories);
    }

    public function create()
    {
        $category = new Category();
        return view('admin.create_category')->with('category', $category);
    }

    public function store(StoreCategoriesRequest $request, Category $category)
    {
        $category->fill([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        $category->save();
        $categories = Category::all();
        return redirect()->route('admin.categories.index', ['categories' => $categories])->with('success', 'Категория добавлена успешно');
    }

    public function edit(Category $category)
    {
        return view('admin.create_category')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();
        $categories = Category::all();
        return redirect()->route('admin.categories.index', ['categories' => $categories])->with('success', 'Категория изменена успешно');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена');
    }
}
