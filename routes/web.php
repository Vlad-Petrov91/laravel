<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserPermissionsController;

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
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::resource('news', AdminNewsController::class)->except(['show']);
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
        Route::get('/change_permissions', [UserPermissionsController::class, 'index'])->name('changePermissions');
        Route::get('/change_permissions/toggle_admin/{user}', [UserPermissionsController::class, 'toggleAdmin'])->name('toggleAdmin');
        Route::get('/download_text', [AdminIndexController::class, 'downloadText'])->name('downloadText');
    });


Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile')->middleware('auth');
Route::view('/info', 'info')->name('info');
Route::view('/authorization', 'authorization')->name('authorization');

Route::fallback(function () {
    return view('404');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
