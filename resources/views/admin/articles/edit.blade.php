@extends('layouts.admin', ['currentPage' => 'articles'])

@section('content')
    <h1 class="mb-3">Edit Article</h1>

    {!! Form::model($article, [
            'method' => 'PUT',
            'route' => ['admin.articles.update', $article],
            'files' => true
        ]) !!}
    {!! Form::textField('Title: ', 'title') !!}
    {!! Form::selectField('Category: ', 'category_id', $categories, ['placeholder' => 'Uncategorized']) !!}

    @if($article->image()->exists())
        <div class="mt-3">
            <img src="{{ $article->image->url() }}" style="max-height: 200px;">
        </div>
    @endif
    {!! Form::fileField('Update Image: ', 'image') !!}

    {!! Form::textareaField('Body: ', 'body') !!}
    {!! Form::textField('Tags: (Comma-separated)', 'tagsList', ['value' => $articleTagsList]) !!}
    {!! Form::submitButton('Update Article') !!}
    {!! Form::close() !!}
@endsection
