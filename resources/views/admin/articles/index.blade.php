@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    @isset($head)
        <h2 class="mb-4">{{ $head }}</h2>
    @endisset

    <a class="btn btn-primary" href="{{ route('admin.articles.create') }}">Create Article</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)

                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td>{{ $article->user->name }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name ?? 'Uncategorized' }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-primary">Show</a>

                        {{ Form::open([
                            'method' => 'GET',
                            'route' => ['admin.articles.edit', $article],
                            'class' => 'mx-1'
                            ]) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                        {{ Form::close() }}

                        {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['admin.articles.destroy', $article],
                                'class' => 'mx-1'
                            ]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
