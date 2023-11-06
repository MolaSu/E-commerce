@extends('shared/dashboard')
@section('title','Manage Category')
@section('body')
<a href="/category/add" class="btn btn-primary m-2">Add Category</a>
<table class="table table-bordered mt-2">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category Code</th>
            <th>Command</th>
        </tr>
    </thead>
    <tbody>
        @foreach($arr as $v)
        <tr>
            <td>{{$v->CategoryId}}</td>
            <td>{{$v->CategoryName}}</td>
            <td>{{$v->CategoryCode}}</td>
            <td>
                <a href="/category/delete/{{$v->CategoryId}}" class="btn btn-primary del">Delete</a>
                <a href="/category/edit/{{$v->CategoryId}}" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('script')

<script>
    $('.del').click(function () {
        return confirm('Are You Sure Delete ?');
    });
</script>

@stop