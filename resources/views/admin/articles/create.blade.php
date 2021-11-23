@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    <h1 class="mb">Create Article</h1>

    {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.articles.store',
            'files' => true
        ]) !!}
    {!! Form::textField('Title: ', 'title') !!}
    {!! Form::selectField('Category: ', 'category_id', $categories, ['placeholder' => 'Uncategorized']) !!}
    {!! Form::fileField('Image: ', 'image') !!}
    {!! Form::textareaField('Body: ', 'body') !!}
    {!! Form::submitButton('Create Article') !!}
    {!! Form::close() !!}
@endsection
