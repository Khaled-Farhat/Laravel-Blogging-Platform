@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    <h1 class="mb-3">Create Article</h1>

    {!! Form::model($article, [
            'method' => 'PUT',
            'route' => ['admin.articles.update', $article]
        ]) !!}
    {!! Form::textField('Title: ', 'title') !!}
    {!! Form::textareaField('Body: ', 'body') !!}
    {!! Form::submitButton('Update Article') !!}
    {!! Form::close() !!}
@endsection
