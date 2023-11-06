<?php

namespace App\Http\Controllers;


use App\Mail\SendMail;
use App\Models\Cart;
use App\Models\District;
use App\Models\province;
use App\Models\Ward;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CartController extends Controller
{
    function index(){
        $token = Cookie::get('cart');
        $arr = DB::select('SELECT Cart.*,ProductName, UnitOfPrice, ImageUrl FROM Cart JOIN Product 
        ON Cart.ProductId = Product.ProductId AND token = ?',[$token]);
        return view('cart.index',['arr'=>$arr]);
    }
    function add(Request $req){
        $data = $req->validate(['ProductId'=>'required|numeric','quantity'=>'required|numeric']);
        if(Cookie::get('cart')==null){
            $data['token'] = Str::random(32);
            Cookie::queue(Cookie::make('cart',$data['token'], 60*24*30,'/'));
        }else{
            $data['token']=Cookie::get('cart');
        }
        //var_dump($data);
        $data['id'] = random_int(99,999999999);
        //var_dump(DB::statement('CALL AddCart(?,?,?,?)',[$data['id'],$data['token'],$data['ProductId'],$data['quantity']]));
        if (DB::statement('CALL AddCart(?,?,?,?)',[$data['id'],$data['token'],$data['ProductId'],$data['quantity']])) {
            return redirect('/cart');
        }
        return redirect('/cart/error');
    }
    function edit(Request $req){
        $data= $req->validate(['quantity'=>'required|numeric']);
        $ret= Cart::where('ProductId',$req->input('ProductId'))->update($data);
        return response()->json($ret);
    }
    function delete(Cart $o){
        if ($o->delete()) {
            return redirect('/cart');
        }
        return redirect('/cart/error');
    }
    function checkout(){
        if (Auth::check()) {
            $token = Cookie::get('cart');
            $arr = DB::select('SELECT Cart.*, ProductName, UnitOfPrice, ImageUrl FROM Cart JOIN Product
            ON Cart.ProductId = Product.ProductId AND token = ?',[$token]);
            return view('cart.checkout',['prr'=>province::all(),'arr'=>$arr]);
        }
        return redirect ('/auth/login?returnUrl=/cart/checkout');
    }
    function districts(Request $req){
        if($req->has('id')){
            $id = $req->input('id');
            $data = District::where('province_id',$id)->get();
            return response()->json($data);
        }
        return response()->json(null);
    }
    function wards(Request $req){
        if($req->has('id')){
            $id=$req->input('id');
            $data = ward::where('district_id',$id)->get();
            return response()->json($data);
    }
    return response()->json(null);
}   
    function doCheckOut(Request $req){
        if (Auth::check()) {
            $data = $req->validate(['phone'=>'required|numeric','address'=>'required' ,'wards_id'=>'required|numeric']);
            $data['id'] = random_int(99,99999999);
            $data['user_id'] = Auth::user()->id;
            $data['token'] = Cookie::get('cart');
            DB::select('CALL AddInvoice(?, ?, ?, ?, ?, ?)',[$data['id'],$data['token'],$data['user_id'],$data['wards_id'],$data['phone'],$data['address']]);
            return redirect('/cart/invoice/'.$data['id']);
        }
        return redirect('/auth/login');
    }

    function invoice(int $id){
        if (Auth::check()) {
            try {
                $o = DB::selectOne('CALL GetInvoice(?)',[$id]);
                //var_dump($o);

                $o->products = DB::select('SELECT InvoiceDetail.*, ProductName, ImageUrl 
                FROM InvoiceDetail JOIN Product 
                ON InvoiceDetail.ProductId = Product.ProductId 
                AND invoice_id = ?',[$id]);
                Mail::to(Auth::user()->email)->send(new SendMail(['content'=> $o, 'title' =>'Your Order']));
                
            } catch (Exception $ex) {
                var_dump($ex->getMessage());
            }
            
            return view('cart.invoice',['o'=>$o]);
        }
        return redirect('/auth/login?returnUrl=/cart/invoice/'.$id);
    }
    //function doDelete(Request $req){
        //$data = $req->validate(['id'=>'required']);
        //if (Cart::findOrFail($data['id'])->delete()) {
        //    return redirect('/cart');
        //}
       // return redirect('/cart/error');
    //}
}
