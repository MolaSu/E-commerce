@extends('shared/dashboard')
@section('title', 'login')
@section('body')
        <div class="main">
        <div class="shop_top">
            <div class="container">
                <div class="col-md-6">
                    <div class="login-page">
                        <h4 class="title">New Customers</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
                        <div class="button1">
                        <a href="/auth/register"><input type="submit" name="Submit" value="Create an Account"></a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="login-title">
                        <h4 class="title">Login Customers</h4>
                        <div id="loginbox" class="loginbox">
                            <form  method="post" name="login" id="login-form">
                            @csrf
                            <fieldset class="input">
                                <p id="login-form-username">
                                <label for="email">Email</label>
                                <input id="Email" type="text" name="email" class="inputbox" size="18" >
                                </p>
                                <p id="login-form-password">
                                <label for="password">Password</label>
                                <input id="Password" type="password" name="password" class="inputbox" size="18">
                                </p>
                                <div class="remember">
                                    <p id="login-form-remember">
                                    <label for="modlgn_remember"><a href="/auth/forgot">Forget Your Password ? </a></label>
                                </p>
                                <div class="text-right">
                                <label for="rem">Remember Me</label>
                                <input type="checkbox" name="rem" id="rem" value="true">
                                </div>
                                    <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
                                </div>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                </div>
            </div>
        </div>
@stop