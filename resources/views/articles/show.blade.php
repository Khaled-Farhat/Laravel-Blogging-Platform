@extends('layouts.app', [
    'categories' => $categories,
    'tags' => $tags,
])

@section('main')
    <div class="card mb-3">
        <img src="https://picsum.photos/1000/1000" class="img-fluid card-img-top" style="max-height: 250px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <h6 class="card-subtitle text-muted">Posted {{ $article->created_at->diffForHumans() }} by <a href="{{ route('user.show', $article->user) }}">{{ $article->user->name }}</a></h6>
            <br>
            <p class="card-text">{!! nl2br(e($article->body)) !!}</p>
        </div>
    </div>
@endsection
