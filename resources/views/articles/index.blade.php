@extends('layouts.blog-page', [
    'categories' => $categories,
    'tags' => $tags,
])

@section('main')
    @isset($head)
        <h2 class="mb-4">{{ $head }}</h2>
    @endisset

    @foreach($articles as $article)
        <div class="card mb-3">
            @if($article->image()->exists())
                <img src="{{ $article->image->url() }}" class="img-fluid card-img-top" style="max-height: 250px; object-fit: cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle text-muted">
                    Posted {{ $article->created_at->diffForHumans() }}
                    by <a href="{{ route('users.show', $article->user) }}">{{ $article->user->name }}</a>
                    @isset($article->category)
                    in category: <a href="{{ route('categories.show', $article->category) }}">{{ $article->category->name }}</a>
                    @endisset
                </h6>

                <div class="my-3">
                    @foreach($article->tags as $tag)
                        <a class="btn-sm btn-light" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>

                <p class="card-text">{{ Str::limit($article->body, 256) }}</p>
                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Continue Reading</a>
            </div>
        </div>
    @endforeach

    {{ $articles->links() }}
@endsection
