<div class="row">
    @foreach($arr as $v)
        <div class="card col-md-4 m-auto">
            <div class="card-header">
                <h4 class=""><a href="/home/details/{{$v['ProductId']}}">{{$v['ProductName']}}</a></h4>
            </div>
            <div class="card-body">
                <p>Price:{{number_format($v->UnitOfPrice)}}</p>
                <a href="/home/details/{{$v['ProductId']}}"><img src="/images/{{$v['ImageUrl']}}" alt="{{$v['ProductName']}}" width="100"></a>
            </div>
        </div>
    @endforeach
</div>