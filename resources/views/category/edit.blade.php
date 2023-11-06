@extends('shared/dashboard')
@section('title','Add Category')

@section('body')
<p>{{$msg}}</p>
<form action="" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$v->id}}" >
    <div>
        <label for="">Category Name</label>
        <input type="text" name="CategoryName" value="{{$v->CategoryName}}" class="form-control">
    </div>
    <div>
        <label for="">Category Code</label>
        <input type="text" name="CategoryCode" class="form-control">
    </div>
    <button class="btn btn-primary">save change</button>
</form>
@stop