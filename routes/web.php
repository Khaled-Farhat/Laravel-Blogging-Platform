<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleController;
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

Route::view('/admin', 'layouts.admin')->name('admin.index');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/articles', ArticleController::class);
    }
);
