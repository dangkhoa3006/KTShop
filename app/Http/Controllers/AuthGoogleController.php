<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
            //Lấy ra người dùng có email tương ứng với email của người dùng từ Google
            $getUser = User::where('email', $googleUser->getEmail())->first();
            //Trường hợp không có dữ liệu thì insert tài khoản mới
            if (!$getUser) {
                $characterSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $newUser = User::create([
                    'avatar' => $googleUser->getAvatar(),
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'role' => 2,
                ]);
                // Save the account
                $newUser->save();
                if ($newUser->role == 2) {
                    $member = Members::create([
                        'code' => substr(str_shuffle($characterSet), 0, 10), // Tạo mã ngẫu nhiên
                        'name' => $newUser->name, // Sử dụng tên từ tài khoản
                        'start_day' => Carbon::now(), // Ngày bắt đầu là ngày hiện tại
                        'end_day' => Carbon::now()->addYear(), // Ngày kết thúc là một năm sau
                        'score' => 0, // Điểm ban đầu
                        'user_id' => $newUser->id, // ID của người dùng
                    ]);
                    $member->save();
                }
                Auth::login($newUser);
                return redirect()->intended('/');
            } else {
                Auth::login($getUser);
                return redirect()->intended('/');
            }
        } catch (\Exception $e) {
            dd("Lỗi không đăng nhập được: ", $e);
        }
    }
}
