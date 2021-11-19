@extends('layouts.admin', ['currentPage' => 'categories'])

@section('content')
    <h1 class="mb">Create Category</h1>

    {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.categories.store'
        ]) !!}
    {!! Form::textField('Category Name: ', 'name') !!}
    {!! Form::submitButton('Create Category') !!}
    {!! Form::close() !!}
@endsection
