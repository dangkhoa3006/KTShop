<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAccountRequest;
use App\Models\Members;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function showForm()
    {
        return view("register");
    }
    public function registerAccount(RegisterAccountRequest $request)
    {
        try
        {
            $characterSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $acc = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2,
            ]);
            // Save the account
            $acc->save();
            if ($acc->role == 2) {
                $member = Members::create([
                    'code' => substr(str_shuffle($characterSet), 0, 10), // Tạo mã ngẫu nhiên
                    'name' => $acc->name, // Sử dụng tên từ tài khoản
                    'start_day' => Carbon::now(), // Ngày bắt đầu là ngày hiện tại
                    'end_day' => Carbon::now()->addYear(), // Ngày kết thúc là một năm sau
                    'score' => 0, // Điểm ban đầu
                    'user_id' => $acc->id, // ID của người dùng
                ]);
                $member->save();
            }
            // Thành cônng -> Redirect sang trang login
            return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công!');
        } catch (\Exception $e) {
            // Thất bại -> Redirect sang trang login
            return redirect()->route('login')->with('error', 'Đăng ký tài khoản không thành công!');
        }
    }

}
