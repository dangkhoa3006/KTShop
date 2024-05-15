<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthGoogleController extends Controller
{
    public function redirectGoogle()
    {
        //Chuyển hướng đến trang xác thực Google
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try
        {
            //Lấy thông tin người dùng từ Google
            $googleUser = Socialite::driver('google')->user();
            //Lấy ra người dùng có google_id tương ứng với id của người dùng từ Google
            $getUser = User::where('email', $googleUser->getEmail())->first();
            //Trường hợp không có dữ liệu thì insert tài khoản mới
            if(!$getUser)
            {
                $newUser = User::create([
                    'avatar'=>$googleUser->getAvatar(),
                    'name'=>$googleUser->getName(),
                    'email'=>$googleUser->getEmail(),
                    'role' => 2,
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
            else
            {
                Auth::login($getUser);
                return redirect()->intended('/');
            }
        }
        catch(\Exception $e)
        {
            dd("Lỗi không đăng nhập được: ",$e);
        }
    }
}
