<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        return view('home.index');
    }

    function shop(){
        $arr = Product::paginate(20);
        $crr=$this->getCategories();
        return view('home.shop',['arr'=>$arr,'crr'=>$crr]);
    }
    function category(int $id){
        $arr = Product::where('CategoryId',$id)->paginate(12);
        $crr=$this->getCategories();
        return view('home.category',['CategoryId'=>$id,'arr'=>$arr,'crr'=>$crr]);
    }
    
    private function getCategories(){
        $crr = Category::all();
        return $crr;
    }
    function details(int $id){
        $arr = Product::where('ProductId',$id)->paginate(6);
        $crr=$this->getCategories();
        return view('home.details',['ProductId'=>$id,'arr'=>$arr,'crr'=>$crr]);
    }

}

