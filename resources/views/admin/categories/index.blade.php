@extends('layouts.admin', ['currentPage' => 'categories'])

@section('content')
        {!! Form::open([
                'method' => 'POST',
                'route' => 'admin.categories.store',
                'class' => 'form-inline'
            ])!!}
            {!! Form::textField('Category Name: ', 'name', 'mx-2') !!}
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td class="d-flex flex-row">
                        {{ Form::open([
                            'method' => 'GET',
                            'route' => ['admin.categories.edit', $category],
                            'class' => 'mx-1'
                        ]) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                    {{ Form::close() }}
                        {{ Form::open([
                                'method' => 'DELETE',
                                'route' => ['admin.categories.destroy', $category],
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
