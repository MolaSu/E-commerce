<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        return view('category.index',['arr'=>Category::all()]);
    }
    function add(request $req){
        if ($req->isMethod("post")) {
            $data = $req->validate(['CategoryName'=>'required','CategoryCode'=>'required']);
            //var_dump($data);
            if (Category::create($data)) {
                return redirect('/category');
            }
            //var_dump($data);
        }
        //var_dump($data);
        return view('category.add');
    }
    function delete(int $id){
        if (Category::remove($id)) {
            return redirect('/category');
        }
        return redirect('/category/error');
    }
    function edit(int $id, request $req){
        $msg = null;
        if ($req->isMethod('post')) {
            $data = $req->validate(['CategoryName'=>'required','CategoryCode'=>'required']);
            if (Category::edit($id,$data)) {
                return redirect('/category');
            }
            $msg = 'Edit Failed';
        }
        return view('category.edit',['v'=>Category::find($id),'msg'=>$msg]);
    } 
}
