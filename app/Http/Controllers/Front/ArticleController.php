<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::with([
                    'user:id,name',
                    'image',
                    'category:id,name',
                    'tags:id,name'
                ])->withCount('comments')
                ->paginate(7),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) {
        return view('articles.show', [
            'article' => $article,
            'comments' => $article->comments()->paginate(5),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
