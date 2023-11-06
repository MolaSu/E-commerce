@extends('shared/dashboard')
@section('title','Shop')

@section('body')
<div class="row">
    @include('home.navigation')
    <div class="col-md-9">
        <h1>Sản phẩm</h1>
        @include('home.product')
        <div class="row">{{$arr->links('pagination::bootstrap-5')}}</div>
    </div>
</div>
@stop