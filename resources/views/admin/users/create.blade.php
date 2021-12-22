@extends('layouts.admin', ['currentPage' => 'users'])

@section('content')
    <h1 class="mb">Create User</h1>

    {!! Form::open([
            'method' => 'POST',
            'route' => 'admin.users.store'
        ]) !!}
    {!! Form::textField('Name: ', 'name') !!}
    {!! Form::emailField('Email: ', 'email') !!}
    {!! Form::selectField('Role: ', 'role_id', $roles) !!}
    {!! Form::passwordField('Password: ', 'password') !!}
    {!! Form::passwordField('Password confirmation: ', 'password_confirmation') !!}
    {!! Form::submitButton('Create User') !!}
    {!! Form::close() !!}
@endsection
