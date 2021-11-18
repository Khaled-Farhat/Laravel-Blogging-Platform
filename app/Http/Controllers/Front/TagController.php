<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
/**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('articles.index', [
            'articles' => $tag->articles,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'head' => 'Showing articles with tag: ' . $tag->name,
        ]);
    }}
