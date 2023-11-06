@extends('shared/dashboard')
@section('title','Detail')

@section('body')
<div class="row">
    @include('home.navigation')
    <div class="col-md-9 card">
        @foreach($arr as $v)
        <div class="card-header">
            <div class="card-tittle h1">{{$v->ProductName}}</div>
        </div>
        <div class="card-body">
            <div class="col-md-4">
                <div><img src="/images/{{$v->ImageUrl}}" alt="{{$v->ProductName}}"></div>
                <p>Price: <b>{{number_format($v->UnitOfPrice)}} </b></p>
                <form action="/cart/add" method="post" class="m-5">
                    @csrf 
                    <input type="hidden" name="ProductId" value="{{$v->ProductId}}">
                    <input type="number" value="1" min="1" name="quantity" max="100">
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
            <div class="col-md-8">
                <p>{{$v->Specification}}</p>
                <br>
                <p>{{$v->Description}}</p>
            </div>
        </div>
        @endforeach
        <br>
        <div class="text-left">
            <h3>Product Relation</h3>
            <div>{{$arr->fragment('relation')->links('pagination::bootstrap-5')}}</div>
            @include('home.product')
        </div>
    </div>
</div>
@stop