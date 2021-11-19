@extends('layouts.admin', ['currentPage' => 'tags'])

@section('content')
    <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Create Tag</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-primary">Show</a>

                        {{ Form::open([
                            'method' => 'GET',
                            'route' => ['admin.tags.edit', $tag],
                            'class' => 'mx-1'
                            ]) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                        {{ Form::close() }}

                        {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['admin.tags.destroy', $tag],
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
