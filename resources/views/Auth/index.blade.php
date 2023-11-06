@extends('shared/dashboard')
@section('title','Index')

@section('body')

<form action="/auth/logout" method="post">
    @csrf 
    <button class="btn btn-default">Logout</button>
</form>

<p>Welcome:{{Auth::user()->email}}</p>
<p>Name:{{Auth::user()->firstname}}</p>
<p>Role:{{Auth::user()->role}}</p>
<p>Id:{{Auth::user()->id}}</p>
@stop