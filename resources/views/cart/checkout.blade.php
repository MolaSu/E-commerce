@extends('shared/dashboard')

@section('title','checkout')

@section('body')
<br>
<div class="row">
    <div class="col-md-5">
        <h1 class="col-md-12">Delivery information</h1>
        <form method="post">
            @csrf
                <div class=" col-md-3">
                    <label for="">Phone</label>
                    <input type="number" name="phone" minlength="10" maxlength="11" class="form-control">
                </div>
                <div class=" col-md-3">
                    <label for="">Province</label>
                    <select name="province_id"  class="form-control">
                        @foreach ($prr as $v)
                            <option value="{{$v->province_id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col-md-3">
                    <label for="">District</label>
                    <select name="district_id"  class="form-control">
                    </select>
                </div>
                <div class=" col-md-3">
                    <label for="">Ward</label>
                    <select name="wards_id"  class="form-control" >
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control">
                    </select>
                </div>
                <button style="margin:2rem;"type="submit" class="text-right btn btn-success" >Submit</button>
                <button class="btn btn-danger"><a href="/cart/delete/{{$v->id}}">Cancel</a></button>
        </form>
    </div>
    <div class="col-md-7">
        <table class="table table-bordered">
            <thead class="table-dark">
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </thead>
            <tbody>
                @foreach($arr as $v)
                <tr>
                    <td>{{$v->ProductName}}</td>
                    <td><img width="100" src="/images/{{$v->ImageUrl}}" alt="{{$v->ProductName}}"></td>
                    <td>{{number_format($v->UnitOfPrice)}}</td>
                    <td>
                        <input type="number" value="{{$v->quantity}}" id="{{$v->id}}" class="qty">
                    </td>
                    <td>{{number_format($v->UnitOfPrice * $v->quantity)}}</td>
                </tr>
                
            </tbody> 
        </table>
    </div>
    @endforeach
</div>
@stop

@section('scripts')
<script>
    function loadData(node, d, id){
        node.empty();
            for (var i in d){
                node.append (`<option value="${d[i][id]}">${d[i]['name']}</option>`);
            }
    }

    function getWards(id){
        $.post('/cart/wards',{'id':id,'_token':$('input[name="_token"]').val()},(d)=>{
            console.log(id);
            var node = $('select[name="wards_id"]');
            loadData(node, d, 'wards_id');
            });
        }


    function getDistricts(id){
        $.post('/cart/districts',{id:id,'_token':$('input[name="_token"]').val()}, (d)=>{
            var node = $('select[name="district_id"]');
            
            loadData(node,d,'district_id');
            console.log(node.val());
            getWards(node.val());
        });
    }

    getDistricts($('select[name="province_id"]').val()); 

    $('select[name="province_id"]').change(function(){
        getDistricts($(this).val());
    });

    $('select[name="province_id"]').change(function(){
        var id = $(this).val();
        getWards(id);
    })

</script>
@stop