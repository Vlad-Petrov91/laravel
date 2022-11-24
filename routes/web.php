<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('news.')
    ->prefix('news')
    ->namespace('News')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/category/{slug}/{news}', [NewsController::class, 'getNewsItem'])->where('slug', '[a-z]+')->name('newsItem');
        Route::name('categories.')
            ->prefix('categories')
            ->namespace('Categories')
            ->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('categories');
                Route::get('/{slug}', [CategoryController::class, 'show'])->where('slug', '[a-z]+')->name('categoryNews');
            });

    });


Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [AdminNewsController::class, 'create'])->name('create');
        Route::get('/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
        Route::post('/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/destroy/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');

        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories');
        Route::match(['get', 'post'], '/create_category', [AdminCategoryController::class, 'create'])->name('create_category');
        Route::get('/edit_category/{category}', [AdminCategoryController::class, 'edit'])->name('edit_category');
        Route::post('/update_category/{category}', [AdminCategoryController::class, 'update'])->name('update_category');
        Route::delete('/destroy_category/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy_category');



        Route::get('/download_img', [AdminIndexController::class, 'downloadImage'])->name('downloadImage');
        Route::get('/download_text', [AdminIndexController::class, 'downloadText'])->name('downloadText');
    });


Route::view('/info', 'info')->name('info');
Route::view('/authorization', 'authorization')->name('authorization');


Route::fallback(function () {
    return view('404');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
