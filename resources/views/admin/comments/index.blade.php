@extends('layouts.admin', ['currentPage' => 'comments'])

@section('content')
    @isset($head)
        <h2 class="mb-4">{{ $head }}</h2>
    @endisset

    @if($comments->isEmpty())
        <h1>No Comment Exists</h1>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Comment content</th>
                    <th scope="col">Article</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->body }}</td>
                        <td><a href="{{ route('articles.show', $comment->article) }}">{{ $comment->article->title }}</a></td>

                        <td class="d-flex flex-row">
                            @can('view', $comment->article)
                                {!! Form::open([
                                        'method' => 'GET',
                                        'route' => ['articles.show', $comment->article],
                                        'class' => 'mr-1'
                                    ]) !!}
                                {!! Form::submitButton('Show Article') !!}
                                {!! Form::close() !!}
                            @endcan


                            @if($comment->isPendingReview())
                                @can('approve', $comment)
                                    {!! Form::open([
                                            'method' => 'PATCH',
                                            'route' => ['admin.comments.approve', $comment],
                                            'class' => 'mr-1'
                                        ]) !!}
                                    {!! Form::submitButton('Approve', 'success') !!}
                                    {!! Form::close() !!}
                                @endcan
                            @endif

                            @can('delete', $comment)
                                {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.comments.destroy', $comment],
                                    ]) !!}
                                {!! Form::submitButton('Delete Comment', 'danger') !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $comments->links() }}
    @endif
@endsection
