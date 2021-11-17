<?php

namespace App\Http\Controllers;

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
        return view('home', [
            'articles' => $user->articles,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'head' => 'Showing articles from user: ' . $user->name,
        ]);
    }
}
