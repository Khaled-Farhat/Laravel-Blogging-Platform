@extends('layouts.admin', ['currentPage' => 'tags'])

@section('content')
    @can('create', App\Models\Tag::class)
        <a class="btn btn-primary mb-3" href="{{ route('admin.tags.create') }}">Create Tag</a>
    @endcan

    @if($tags->isEmpty())
        <h1>No Tag Exists</h1>
    @else
        <table class="table">
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
                            @can('view', $tag)
                                <a href="{{ route('admin.tags.show', $tag) }}" class="btn btn-primary">Show Articles</a>
                            @endcan

                            @can('update', $tag)
                                {{ Form::open([
                                    'method' => 'GET',
                                    'route' => ['admin.tags.edit', $tag],
                                    'class' => 'mx-1'
                                    ]) }}
                                {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                                {{ Form::close() }}
                            @endcan

                            @can('delete', $tag)
                                {{ Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['admin.tags.destroy', $tag],
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

        {{ $tags->links() }}
    @endif
@endsection
