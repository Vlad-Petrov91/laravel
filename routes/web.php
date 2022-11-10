<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;

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
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/add', [NewsController::class, 'addNews'])->name('addNews');
        Route::get('/one/{id}', [NewsController::class, 'getNewsItem'])->where('id', '[0-9]+')->name('newsItem');
        Route::name('categories.')
            ->prefix('categories')
            ->namespace('Categories')
            ->group(function () {
                Route::get('/', [CategoriesController::class, 'index'])->name('categories');
                Route::get('/{slug}', [CategoriesController::class, 'showCategoryNews'])->where('slug', '[a-z]+')->name('categoryNews');
            });

    });


//Route::prefix('categories')
//    ->group(function () {
//        Route::get('/', [CategoriesController::class, 'index'])->name('categories');
//        Route::get('/{slug}', [CategoriesController::class, 'showCategoryNews'])->where('slug', '[a-z]+')->name('categoryNews');
//    });


Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
    });


Route::view('/info', 'info')->name('info');
Route::view('/authorization', 'authorization')->name('authorization');


Route::fallback(function () {
    return view('404');
});
