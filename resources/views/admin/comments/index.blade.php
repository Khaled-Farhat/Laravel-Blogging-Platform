@extends('layouts.admin', ['currentPage' => 'comments'])

@section('content')
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col-2">Author</th>
                <th scope="col">Comment content</th>
                <th scope="col">Article</th>
                <th scope="col-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->id }}</th>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->article->title }}</td>

                    <td class="d-flex flex-row">
                        {!! Form::open([
                                'method' => 'GET',
                                'route' => ['articles.show', $comment->article],
                                'class' => 'mr-1'
                            ]) !!}
                        {!! Form::submitButton('Show Article') !!}
                        {!! Form::close() !!}

                        @if($comment->isPendingReview())
                            {!! Form::open([
                                    'method' => 'PATCH',
                                    'route' => ['admin.comments.approve', $comment],
                                    'class' => 'mr-1'
                                ]) !!}
                            {!! Form::submitButton('Approve', 'success') !!}
                            {!! Form::close() !!}
                        @endif

                        {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['admin.comments.destroy', $comment],
                            ]) !!}
                        {!! Form::submitButton('Delete Comment', 'danger') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
