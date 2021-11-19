@extends('layouts.admin', ['currentPage' => 'tags'])

@section('content')
    <h1 class="mb">Create Tag</h1>

    {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.tags.store'
        ]) !!}
    {!! Form::textField('Tag Name: ', 'name') !!}
    {!! Form::submitButton('Create Tag') !!}
    {!! Form::close() !!}
@endsection
