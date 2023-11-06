@extends('shared/dashboard')
@section('title','Product')

@section('body')
<a href="/product/add" class="btn btn-success m-5">Add Product</a>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr><th colspan="14" class="bg bg-danger">Product List</th></tr>
        <tr class='bg-primary'>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Unit</th>
            <th>Description</th>
            <th>Specification</th>
            <th>Image</th>
            <th>Price</th>
            <th>Command</th>
        </tr>
    </thead>
    <tbody>
        @foreach($arr as $v)
        <tr>
            <td>{{$v->ProductId}}</td>
            <td>{{$v->CategoryId}}</td>
            <td>{{$v->ProductCode}}</td>
            <td>{{$v->ProductName}}</td>
            <td>{{$v->Unit}}</td>
            <td>{{$v->Description}}</td>
            <td>{{$v->Specification}}</td>
            <td>
                <img src="/images/{{$v->ImageUrl}}" width="100" alt="{{$v->ProductName}}">
            </td>
            <td>{{number_format($v->UnitOfPrice)}}</td>
            <td>
                <a href="/product/edit/{{$v->ProductId}}" class="btn btn-primary">Edit</a>
                <a href="/product/delete/{{$v->ProductId}}" class="btn btn-primary del">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
@section('scripts')
<script>
    $('.del').click(function(){
        return confirm('Are u sure delete?');
    });
    $(liveToast).toast('show');
</script>
@stop