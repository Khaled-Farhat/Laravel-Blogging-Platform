@extends('layouts.admin')

@section('content')
    <a class="btn btn-primary">Create Category</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>
                    <a class="btn btn-warning">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>
                    <a class="btn btn-warning">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection