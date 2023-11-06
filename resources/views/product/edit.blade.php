@extends('shared/dashboard')
@section('title','Product')

@section('body')
<form enctype="multipart/form-data" method="post">
    @csrf
    <h1>Edit Product</h1>
    <div class="row">
            <input type="hidden" name="ProductId" value="{{$o->ProductId}}">
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Category</label>
            <div class="col-10">
                <select name="CategoryId" class="form-control">
                    @foreach ($crr as $v)
                        @if($v->CategoryId == $o->CategoryId)
                            <option selected value="{{$v->CategoryId}}">{{$v->CategoryName}}</option>
                        @else
                            <option value="{{$v->CategoryId}}">{{$v->CategoryName}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Product Name</label>
            <div class="col-10">
                <input type="text" class="form-control" name="ProductName" value="{{$o->ProductName}}">
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Product Code</label>
            <div class="col-10">
                <input type="text" class="form-control" name="ProductCode" value="{{$o->ProductCode}}">
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Unit</label>
            <div class="col-10">
                <select name="Unit" class="form-control">
                        <option selected value="{{$o->Unit}}">{{$o->Unit}}</option>
                        <option>Cái</option>
                        <option>Chiếc</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label class="col-2 h4 text-capitalize">Description</label>
            <div class="col-10">
                <textarea name="Description" class="form-control" >{{$o->Description}}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <label class="col-2 h4 text-capitalize">Specification</label>
            <div class="col-10">
                <textarea name="Specification" class="form-control" >{{$o->Specification}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <label class="col-2 h4 text-capitalize">Image</label>
            <div class="col-1">
                <img src="/images/{{$o->ImageUrl}}" alt="{{$o->ProductName}}" class="img-fluid w-100">
            </div>
            <div class="col-9">
                <input type="hidden" value="{{$o->ImageUrl}}" class="img-fluid w-100">
                <input type="file" name="f" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="col-md-6">
            <label class="col-2 h4 text-capitalize">Price</label>
            <div class="col-10">
                <input type="number" step="0.01" min="0" name="UnitOfPrice" value="{{$o->UnitOfPrice}}" class="form-control">
            </div>
        </div>
        <div class="col-md-12 text-right ">
            <button class="btn btn-primary ">Save Changes</button>
            <a href="/product" class="btn btn-primary ">Cancel</a>
        </div>
    </div>
</form>
@stop