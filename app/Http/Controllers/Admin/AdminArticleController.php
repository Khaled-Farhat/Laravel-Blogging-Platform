<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Article::class);

        return view('admin.articles.index', [
            'articles' => Article::with([
                'user:id,name',
                'image',
                'category:id,name',
                'tags:id,name'
                ])->paginate(7),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Article::class);

        return view('admin.articles.create', [
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Article\StoreArticleRequest;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        unset($data['image']);

        $article = auth()->user()->articles()->create($data);

        if ($request->hasFile('image')) {
            $image_path = $request->image->store('images');
            $image = new Image(['path' => $image_path]);
            $article->image()->save($image);
        }

        session()->flash('alert.success', 'The article was created successfully');
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $this->authorize('view', $article);

        return redirect()->route('articles.show', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Article\UpdateArticleRequest;  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        unset($data['image']);

        $article->update($data);

        if ($request->hasFile('image')) {
            $image_path = $request->image->store('images');
            $image = new Image(['path' => $image_path]);

            if ($article->image()->exists()) {
                $article->image->delete();
            }

            $article->image()->save($image);
        }

        session()->flash('alert.success', 'The article was updated successfully');
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        session()->flash('alert.success', 'The article was deleted successfully');
        return redirect()->back();
    }
}
