@extends('shared/dashboard')
@section('body')
<div class="row">
    @include('home.navigation')
    <div class="col-md-9 row">
        @foreach($arr as $s)
            <div class="card">
                <div class="card-header">
                    <div class="card-tittle"><h3><a href="/home/details/{{$s->ProductId}}">{{$s->ProductName}}</a></h3></div>
                </div>
                <div class="card-body">
                    <div>
                        <div><a href="/home/details/{{$s->ProductId}}"><img width="100" src="/images/{{$s->ImageUrl}}" alt="{{$s->ProductName}}"></a></div>
                        <p>Price: <b>{{number_format($s->UnitOfPrice)}}</b></p>
                        <p>{{$s->Description}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="row text-right">{{$arr->links('pagination::bootstrap-5')}}</div>
    </div>
</div>
@stop
