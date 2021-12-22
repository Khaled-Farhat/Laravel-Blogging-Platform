@extends('layouts.admin', ['currentPage' => 'users'])

@section('content')
    <h1 class="mb-3">Edit User</h1>

    {!! Form::model($user, [
            'method' => 'PUT',
            'route' => ['admin.users.update', $user]
        ]) !!}
    {!! Form::token() !!}
    {!! Form::textField('Name: ', 'name') !!}
    {!! Form::emailField('Email: ', 'email') !!}

    @can('changeRole', $user)
        {!! Form::selectField('Role: ', 'role_id', $roles) !!}
    @endcan

    {!! Form::passwordField('Password: ', 'password') !!}
    {!! Form::passwordField('Password confirmation: ', 'password_confirmation') !!}
    {!! Form::submitButton('Edit User') !!}
    {!! Form::close() !!}
@endsection
