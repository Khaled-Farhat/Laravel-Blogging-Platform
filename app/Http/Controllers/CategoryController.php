<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('articles.index', [
            'articles' => $category->articles,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'head' => 'Showing articles from category: ' . $category->name,
        ]);
    }
}
