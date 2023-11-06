<div class="col-md-3">
        <ul>             
            @foreach($crr as $v)
                <li>
                    <a href="/home/category/{{$v->CategoryId}}"><h4>{{$v->CategoryName}}</h4></a>
                </li>
            @endforeach
        </ul>
    </div>