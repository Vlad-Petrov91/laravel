<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

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
//Route::get('/save', [HomeController::class, 'save'])->name('save');

Route::name('news.')
    ->prefix('news')
    ->namespace('News')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{slug}/{id}', [NewsController::class, 'getNewsItem'])->where(['slug' => '[a-z]+', 'id' => '[0-9]+'])->name('newsItem');
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
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::match(['get', 'post'],'/create', [AdminIndexController::class, 'create'])->name('create');
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
