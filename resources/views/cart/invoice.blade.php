@extends('shared/dashboard')

@section('title','Invoice')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="card-tittle h4">{{$o->id}}</div>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <th>Date :</th>
                <td>{{$o->created_at}}</td>
            </tr>
            <tr>
                <th>Phone :</th>
                <td>{{$o->phone}}</td>
            </tr>
            <tr>
                <th>Address :</th>
                <td>{{$o->address}},{{$o->ward_name}},{{$o->district_name}},{{$o->province_name}}</td>
            </tr>
        </table>
    </div>
</div>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Product Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($o->products as $v)
        <tr>
            <td>{{$v->ProductName}}</td>
            <td>
                <img src="/images/{{$v->ImageUrl}}" alt="{{$v->ProductName}}" width="100">
            </td>
            <td>{{$v->UnitOfPrice}}</td>
            <td>{{$v->quantity}}</td>
            <td>{{$v->UnitOfPrice * $v->quantity}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop