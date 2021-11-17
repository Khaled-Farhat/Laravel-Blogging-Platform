<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::all(),
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
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
