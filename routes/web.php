<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminImageController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\UserController;

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

Auth::routes([
    'register' => false
]);

Route::redirect('/', '/articles')->name('home');

Route::resource('/articles', ArticleController::class)->only('index', 'show');
Route::resource('/categories', CategoryController::class)->only('show');
Route::resource('/comments', CommentController::class)->only('store');
Route::resource('/tags', TagController::class)->only('show');
Route::resource('/users', UserController::class)->only('show');

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::redirect('/', '/admin/articles')->name('index');

        Route::resource('/articles', AdminArticleController::class);
        Route::resource('/categories', AdminCategoryController::class);

        Route::get('/articles/{article}/comments', [AdminCommentController::class, 'articleIndex'])->name('articles.comments.index');
        Route::match(['PUT', 'PATCH'], '/comments/{comment}', [AdminCommentController::class, 'approve'])->name('comments.approve');
        Route::resource('/comments', AdminCommentController::class)->only(['index', 'destroy']);

        Route::resource('/images', AdminImageController::class)->only(['destroy']);

        Route::resource('/tags', AdminTagController::class);
        Route::resource('/users', AdminUserController::class);
    }
);
