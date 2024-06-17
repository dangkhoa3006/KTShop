<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthFacebookController extends Controller
{
    //Chức năng đăng nhập Facebook hiện không đăng nhập được
    public function redirectFacebook()
    {
        //Chuyển hướng đến trang xác thực Facebook
        return Socialite::driver('facebook')->redirect();
    }
}
