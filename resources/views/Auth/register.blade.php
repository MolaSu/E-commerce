@extends('shared/dashboard')
@section('title', 'register')
@section('body')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <form method="post"> 
                    @csrf
                        <div class="register-top-grid">
                            <h2>PERSONAL INFORMATION</h2>
                                <div>
                                    <span>First Name<label>*</label></span>
                                    <input type="text" name="firstname" id="FirstName"> 
                                </div>
                                <div>
                                    <span>Last Name<label>*</label></span>
                                    <input type="text" name="lastname" id="LastName"> 
                                </div>
                                <div class="clear"> </div>
                                    <a class="news-letter" href="#">
                                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
                                    </a>
                                <div class="clear"> </div>
                        </div>
                                <div class="clear"> </div>
                        <div class="register-bottom-grid">
                            <h2>LOGIN INFORMATION</h2>
                                <div>
                                    <span>Name<label>*</label></span>
                                    <input  type="text" name="name" id="Name"> 
                                </div>
                                <div>
                                    <span>Email <label>*</label></span>
                                    <input  type="email" name="email" id="Email"> 
                                </div>
                                <div>
                                    <span>Password<label>*</label></span>
                                    <input type="password" class="w-100" name="password" id="Password">
                                </div>
                                <div>
                                    <span>Confirm Password<label>*</label></span>
                                    <input type="password" name="rePassword" id="rePassword">
                                </div>
                                <div class="clear"> </div>
                        </div>
                                <div class="clear"></div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop