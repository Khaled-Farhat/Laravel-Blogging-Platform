@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    <h1 class="mb-3">Create Article</h1>

    {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.articles.store'
        ]) !!}
        {!! Form::textField('Title: ', 'title') !!}
        {!! Form::textareaField('Body: ', 'body') !!}
        {!! Form::submitButton('Create Article') !!}
    {!! Form::close() !!}
@endsection
