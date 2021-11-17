<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $category
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('articles.index', [
            'articles' => $user->articles,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'head' => 'Showing articles from user: ' . $user->name,
        ]);
    }
}
