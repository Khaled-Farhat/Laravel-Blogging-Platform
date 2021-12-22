@extends('layouts.blog-page', [
    'categories' => $categories,
    'tags' => $tags,
])

@section('main')
    <div class="card mb-3">
        @if($article->image()->exists())
            <img src="{{ $article->image->url() }}" class="img-fluid card-img-top" style="max-height: 250px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h4 class="card-title">{{ $article->title }}</h4>
            <h6 class="card-subtitle text-muted">
                Posted {{ $article->created_at->diffForHumans() }}
                by <a href="{{ route('users.show', $article->user) }}">{{ $article->user->name }}</a>
                @isset($article->category)
                in category: <a href="{{ route('categories.show', $article->category) }}">{{ $article->category->name }}</a>
                @endisset
            </h6>
            <p class="card-text my-4">{!! nl2br(e($article->body)) !!}</p>

            @if($article->tags->isNotEmpty())
                <div class="my-3">
                    @foreach($article->tags as $tag)
                        <a class="btn-sm btn-light" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h4 class="card-title mb-4">Comments</h4>

                @foreach($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title">{{ $comment->name }}</h6>
                            <h6 class="card-subtitle text-muted">{{ $comment->created_at->diffForHumans() }}</h6>
                            <br>

                            <p class="card-text">{!! nl2br(e($comment->body)) !!}</p>
                        </div>
                    </div>
                @endforeach

                {{ $comments->links() }}

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create a comment:</h5>
                        {{ Form::open([
                                'method' => 'POST',
                                'route' => 'comments.store'
                            ]) }}
                        {{ Form::hidden('article_id', $article->id) }}
                        {{ Form::textField('Name: ', 'name') }}
                        {{ Form::textareaField('Comment: ', 'body') }}
                        {{ Form::submitButton('Create commment') }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
