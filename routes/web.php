<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles/{article}', [HomeController::class, 'show'])->name('article.show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::view('/admin', 'layouts.admin')->name('admin.index');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/tags', AdminTagController::class);
        Route::resource('/articles', ArticleController::class);
    }
);
