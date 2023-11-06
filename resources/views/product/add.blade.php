@extends('shared/dashboard')
@section('title','Add Product')

@section('body')
<form enctype="multipart/form-data" method="post">
    @csrf
    <h1 >Add Product</h1>
    <div class="row">
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Category</label>
            <div class="col-10">
                <select name="CategoryId" class="form-control">
                <?php var_dump($crr); ?>
                    @foreach ($crr as $v)
                    <option value="{{$v->CategoryId}}">{{$v->CategoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Product Name</label>
            <div class="col-10">
                <input type="text" class="form-control" name="ProductName">
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Product Code</label>
            <div class="col-10">
                <input type="text" class="form-control" name="ProductCode">
            </div>
        </div>
        <div class="col-md-3">
            <label class="col-2 h4 text-capitalize">Unit</label>
            <div class="col-10">
                <select name="Unit" class="form-control">
                        <option>Chiếc</option>
                        <option>Cái</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label class="col-2 h4 text-capitalize">Description</label>
            <div class="col-10">
                <textarea name="Description" class="form-control" ></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <label class="col-2 h4 text-capitalize">Specification</label>
            <div class="col-10">
                <textarea name="Specification" class="form-control" ></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <label class="col-2 h4 text-capitalize">Image</label>
            <div class="col-10">
                <input type="file" name="f" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="col-md-6">
            <label class="col-2 h4 text-capitalize">Price</label>
            <div class="col-10">
                <input type="number" step="0.01" min="0" name="UnitOfPrice" class="form-control">
            </div>
        </div>
        <div class="col-md-12 text-right ">
            <button class="btn btn-primary ">Save Changes</button>
            <a href="/product" class="btn btn-primary ">Cancel</a>
        </div>
    </div>
</form>
@stop