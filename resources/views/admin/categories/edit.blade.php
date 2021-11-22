@extends('layouts.admin', ['currentPage' => 'categories'])

@section('content')
        {!! Form::model($category, [
                'method' => 'PUT',
                'route' => ['admin.categories.update', $category]
            ])!!}
        {!! Form::textField('Category Name: ', 'name', ['class' => 'mb-1', 'required']) !!}
        {!! Form::submit('Update  Category', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        </tbody>
    </table>
@endsection
