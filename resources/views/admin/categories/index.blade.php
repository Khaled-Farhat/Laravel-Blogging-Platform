@extends('layouts.admin', ['currentPage' => 'categories'])

@section('content')
    @can('create', App\Models\Category::class)
        <a class="btn btn-primary mb-3" href="{{ route('admin.categories.create') }}">Create Category</a>
    @endcan

    @if($categories->isEmpty())
        <h1>No Category Exists</h1>
    @else
        <table class="table">
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
                            @can('view', $category)
                                <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary">Show Articles</a>
                            @endcan

                            @can('update', $category)
                                {{ Form::open([
                                    'method' => 'GET',
                                    'route' => ['admin.categories.edit', $category],
                                    'class' => 'mx-1'
                                    ]) }}
                                {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                                {{ Form::close() }}
                            @endcan

                            @can('delete', $category)
                                {{ Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.categories.destroy', $category],
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

        {{ $categories->links() }}
    @endif
@endsection
