@extends('shared/dashboard')

@section('title','Cart')

@section('body')
<br>
<table class="table table-bordered">
    <thead class="table-dark">
        <th>Product</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <Th>Amount</Th>
        <th>Command</th>
    </thead>
    <tbody>
        @foreach($arr as $v)
        <tr>
            <td>{{$v->ProductName}}</td>
            <td><img width="100" src="/images/{{$v->ImageUrl}}" alt="{{$v->ProductName}}"></td>
            <td>{{number_format($v->UnitOfPrice)}}</td>
            <td>
                <input type="number" value="{{$v->quantity}}" id="{{$v->ProductId}}" class="qty">
            </td>
            <td>{{number_format($v->UnitOfPrice * $v->quantity)}}</td>
            <td><a href="/cart/delete/{{$v->id}}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-right"><a href="/cart/checkout" class="btn btn-primary">Check Out</a></div>
<br>
@stop

@section('scripts')
<script>
    $('.qty').change(function(){
        var node = $(this);
        var o = {'ProductId':node.attr('ProductId'),'quantity':node.val(),'_token':$('input[name="_token"]').val()};
        $.post('/cart/edit',o,(d)=>{
            console.log(d);
            if (d == 1) {
                window.location.reload();
            }
        });
    });
</script>
@stop