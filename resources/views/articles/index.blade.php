@extends('layouts.app', [
    'categories' => $categories,
    'tags' => $tags,
])

@section('main')
    @isset($head)
        <h2 class="mb-4">{{ $head }}</h2>
    @endisset

    @foreach($articles as $article)
        <div class="card mb-3">
            <img src="https://picsum.photos/1000/1000" class="img-fluid card-img-top" style="max-height: 250px; object-fit: cover;">
            <div class="card-body">
                <a href="{{ route('category.show', $article->category) }}" class="btn btn-light mb-2">{{ $article->category->name }}</a>
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle text-muted">Posted {{ $article->created_at->diffForHumans() }} by <a href="{{ route('user.show', $article->user) }}">{{ $article->user->name }}</a></h6>
                <br>
                <p class="card-text">{{ Str::limit($article->body, 256) }}</p>
                <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Continue Reading</a>
            </div>
        </div>
    @endforeach
@endsection
