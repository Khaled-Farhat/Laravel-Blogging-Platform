@extends('layouts.admin', ['currentPage' => 'users'])

@section('content')
    @can('create', App\Models\User::class)
        <a class="btn btn-primary mb-3" href="{{ route('admin.users.create') }}">Create User</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)

                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td scope="row">{{ $user->role->name }}</th>
                    <td scope="row">{{ $user->name }}</td>
                    <td scope="row">{{ $user->email }}</td>
                    <td scope="row" class="d-flex flex-row">
                        @can('view', $user)
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-primary">Show Articles</a>
                        @endcan

                        @can('update', $user)
                            {{ Form::open([
                                'method' => 'GET',
                                'route' => ['admin.users.edit', $user],
                                'class' => 'mx-1'
                                ]) }}
                            {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                            {{ Form::close() }}
                        @endcan

                        @can('delete', $user)
                            {{ Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['admin.users.destroy', $user],
                                    'class' => 'mx-1'
                                ]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
