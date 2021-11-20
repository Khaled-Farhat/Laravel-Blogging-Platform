@extends('layouts.admin', ['currentPage' => 'users'])

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create User</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)

                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-primary">Show Articles</a>

                        {{ Form::open([
                            'method' => 'GET',
                            'route' => ['admin.users.edit', $user],
                            'class' => 'mx-1'
                            ]) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                        {{ Form::close() }}

                        {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['admin.users.destroy', $user],
                                'class' => 'mx-1'
                            ]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
