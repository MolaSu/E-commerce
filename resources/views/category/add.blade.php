@extends('shared/dashboard')
@section('title','Add Category')

@section('body')
<form method="post">
    @csrf 
    <div>
        <label for="">Category Name</label>
        <input type="text" name="CategoryName" class="form-control">
    </div>
    <div>
        <label for="">Category Code</label>
        <input type="text" name="CategoryCode" class="form-control">
    </div>
    <div class="mt-2">
    <button class="btn btn-primary mt-2">Save change</button>
    </div>
</form>
@stop