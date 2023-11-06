<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AuthController extends Controller
{   
    function register(request $req){
        if($req->isMethod('post')){
            $data = $req->validate(['firstname'=>'required','lastname'=>'required','email'=>'required|email|Unique:User', 'name' => 'required', 'password'=>'required']);
            //var_dump($data);
            $data['id']=random_int(9999,999999999);
            $data['role']='member';
            $data['password']= Hash::make($data['password']);
            if (User::create($data)) {
                return redirect('/auth/login');
            }
        }
        return view('auth.register');
    }
    function index(){
        if (Auth::check()) {
            return view('auth.index');
        }
        return redirect('/auth/login');
    }
    function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }
    function login(request $req){
        if ($req->isMethod('post')) {
            $data = $req->validate(['email'=>'required|email','password'=>'required']);

            //var_dump($data);
            $rem = $req->has('rem');
            //var_dump($data,$rem);
            var_dump(Auth::attempt($data,$rem));
            if (Auth::attempt($data,$rem)) {
                if ($req->has('returnUrl')) {
                    return redirect($req->input('returnUrl'));
                }
                return redirect('/auth');
            }else{
                return view('auth.login',['msg'=>'login failed']);
            }
        }
        return view('auth.login');
    }
}
