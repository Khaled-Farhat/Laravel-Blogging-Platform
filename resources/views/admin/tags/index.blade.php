@extends('layouts.admin', ['currentPage' => 'tags'])

@section('content')
        {!! Form::open([
                'method' => 'POST',
                'route' => 'admin.tags.store',
                'class' => 'form-inline'
            ])!!}
            {!! Form::textField('Tag Name: ', 'name', 'mx-2') !!}
            {!! Form::submit('Create Tag', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

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
