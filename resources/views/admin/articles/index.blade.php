@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    @if(isset($head))
        <h2 class="mb-4">{{ $head }}</h2>
    @else
        @can('create', App\Models\Article::class)
            <a class="btn btn-primary mb-3" href="{{ route('admin.articles.create') }}">Create Article</a>
        @endcan
    @endif

    @if($articles->isEmpty())
        <h1>No Article Exists</h1>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Last update</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="co">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->updated_at->diffForHumans() }}</td>
                        <td><a href="{{ route('admin.users.show', $article->user) }}">{{ $article->user->name }}</a></td>
                        <td><a href="{{ route('admin.articles.show', $article) }}">{{ $article->title }}</a></td>
                        <td>
                            @if(!is_null($article->image))
                                <img src="{{ $article->image->url() }}" class="img-fluid card-img-top" style="max-height: 40px; max-width:100px; object-fit: cover;">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            @isset($article->category)
                                <a href="{{ route('admin.categories.show', $article->category) }}">{{ $article->category->name }}</a>
                            @else
                                Uncategorized
                            @endisset
                        </td>
                        <td class="d-flex flex-row">
                            @can('view', $article)
                                <a href="{{ route('admin.articles.comments.index', $article) }}" class="btn btn-primary">Comments</a>
                            @endcan

                            @can('update', $article)
                                {{ Form::open([
                                    'method' => 'GET',
                                    'route' => ['admin.articles.edit', $article],
                                    'class' => 'mx-1'
                                    ]) }}
                                {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                                {{ Form::close() }}
                            @endcan

                            @can('delete', $article)
                                {{ Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.articles.destroy', $article],
                                        'class' => 'mx-1'
                                    ]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $articles->links() }}
    @endif
@endsection
