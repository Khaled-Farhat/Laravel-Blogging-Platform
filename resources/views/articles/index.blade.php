@extends('layouts.blog-page', [
    'categories' => $categories,
    'tags' => $tags,
])

@section('main')
    @isset($head)
        <h2 class="mb-4">{{ $head }}</h2>
    @endisset

    @if($articles->isEmpty())
        <h1>No Article Exists</h1>
    @else
        @foreach($articles as $article)
            <div class="card mb-3">
                @if(!is_null($article->image))
                    <img src="{{ $article->image->url() }}" class="img-fluid card-img-top" style="max-height: 250px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <h6 class="card-subtitle text-muted mt-3">
                        Posted {{ $article->created_at->diffForHumans() }}
                        by <a href="{{ route('users.show', $article->user) }}">{{ $article->user->name }}</a>
                        @isset($article->category)
                        in category: <a href="{{ route('categories.show', $article->category) }}">{{ $article->category->name }}</a>
                        @endisset
                    </h6>

                    @isset($article->tags)
                        <div class="mt-2">
                            <div class="d-inline card-subtitle text-muted mr-2">Tags:</div>

                            @foreach($article->tags as $tag)
                                <a class="btn-sm btn-light" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endisset

                    <h6 class="mt-2 card-subtitle text-muted">
                        {{ $article->comments_count }}

                        @if($article->comments_count == 1)
                            Comment
                        @else
                            Commments
                        @endif
                    </h6>

                    <p class="card-text mt-4">{{ Str::limit($article->body, 256) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Continue Reading</a>
                </div>
            </div>
        @endforeach

        {{ $articles->links() }}
    @endif
@endsection
