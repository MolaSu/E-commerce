<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function index(){
        return view('product.index',['arr'=>Product::all()]);
    }

    function edit(int $id,Product $o ,request $req){
        $o = Product::where('ProductId', $id)->first();
        
        if ($req->isMethod('post')) {
            $data = $req->validate([
                'CategoryId'=>'required',
                'ProductCode' =>'required',
                'ProductName'=>'required',
                'Unit'=>'required',
                'Description'=>'required',
                'Specification'=>'required',
                'UnitOfPrice'=>'required|numeric']);
        if ($req->hasFile('f')) {
            $path = 'images/' . $o->ImageUrl;
            if (File::exists($path)) {
                File::delete($path);
            }
            $f = $req->file('f');
            $ext = $f->extension();
            $fileName = Str::random(31-strlen($ext)).'.' . $ext;
            $f->move('images',$fileName);
            $data['ImageUrl'] = $fileName;
        }
        if (Product::edit($id,$data)) {
            return redirect('/product')->with('success','Add Successfully');
        }
        }
        //var_dump($o);
        //var_dump($id);
        return view('product.edit',['ProductId'=>$id,'o'=>$o ,'crr'=>Category::all()]);
    }

    function delete(int $id){
        $o = Product::where('ProductId', $id)->first();
        $path = 'images/' . $o->ImageUrl;
        if (File::exists($path)) {
            File::delete($path);
        }
        if (Product::where('ProductId', $id)->delete()){
            return redirect('/product')->with('success','Delete Success');
        }
                return redirect('/product/error');
        }
    
    function add(request $req){
        if ($req->isMethod('post')) {
            if ($req->hasFile('f')) {
                $data = $req->validate([   
                    'CategoryId'=>'required',
                    'ProductCode' =>'required',
                    'ProductName'=>'required',
                    'Unit'=>'required',
                    'Description'=>'required',
                    'Specification'=>'required',
                    'UnitOfPrice'=>'required|numeric']);
                $f = $req->file('f');
                $ext = $f->extension();
                $fileName = Str::random(31-strlen($ext)).'.'.$ext;
                $f->move('images',$fileName);
                $data['ImageUrl']= $fileName;
                if (Product::create($data)) {
                    return redirect('/product')->with('success','Add Successfully');
                }
            }
        }
        return view('product.add',['crr'=>Category::all()]);
    }
}
