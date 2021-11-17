@extends('layouts.admin', ['currentPage' => 'tags'])

@section('content')
        {!! Form::model($tag, [
                'method' => 'PUT',
                'route' => ['admin.tags.update', $tag]
            ])!!}
            {!! Form::textField('Tag Name: ', 'name', 'mb-1', 'required') !!}
            {!! Form::submit('Update  Tag', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </tbody>
    </table>
@endsection
