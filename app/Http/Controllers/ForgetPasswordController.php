<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function forgetPasswordForm()
    {
        return view('forget-password');
    }
    //Xác thực e-mail và insert dữ liệu vào bảng "password_reset_tokens"
    public function getPasswordForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'regex:/^[^@]+@gmail\.com$/'],
        ], [
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.regex' => 'Email phải đúng định dạng @gmail.com',
        ]);
        //Kiểm tra email có tồn tại trong bảng "users" hay không
        $existEmail = DB::table('users')->where('email', $request->email)->exists();
        //Kiểm tra email có tồn tại trong bảng "password_reset_tokens" hay không
        $existEmailToken = DB::table('password_reset_tokens')->where('email', $request->email)->exists();
        // Trả về false -> email không tồn tại, true ->email tồn tại
        if (!$existEmail) {
            return redirect()->route('login')
                ->with('error', 'Email không tồn tại trong hệ thống.');
        }
        // Trả về false -> email không tồn tại, true ->email tồn tại
        if ($existEmailToken) {
            return redirect()->route('forgetPassword')
                ->with('warning', 'Vui lòng kiểm tra email của bạn.');
        }

        //Nếu tồn tại email -> gửi mail đổi mật khẩu
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        //Gửi mail với template là "send-mail.blade.php"
        Mail::send("send-mail", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Đổi mật khẩu - KTMobile Shop");
        });
        return redirect()->route('forgetPassword')->with('success', 'Vui lòng kiểm tra email của bạn!');

    }
    public function resetPassword($token)
    {
        $getToken = DB::table('password_reset_tokens')->where('token', $token)->first();
        if($getToken)
        {
            return view('reset-password', compact('token'));
        }
        return redirect()->route('forgetPassword')->with('warning', 'Yêu cầu đã hết hạn.');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W_]/', 'confirmed'],
        ], [
            'password.required' => 'Bắt buộc nhập mật khẩu.',
            'password.confirmed' => 'Mật khẩu không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu không đúng định dạng. Mật khẩu chứa ít nhất một ký tự in hoa, một ký tự thường, một ký tự số và một ký tự đặc biệt.',
        ]);
        //Mỗi email có 1 token duy nhất
        $updatePassword = DB::table('password_reset_tokens')->where([
            'token' => $request->token,
        ])->first();
        //dd($updatePassword->email);
        //Lấy email thông qua token và so sánh với email trong bảng users
        $getUserMail = DB::table('users')->where('email', $updatePassword->email)->first();
        if ($getUserMail == null) {
            return redirect()->route('login')->with('error', 'Email không tồn tại trong hệ thống.');
        }
        //dd($updatePassword->email);
        if (!$updatePassword) {
            return redirect()->to(route('resetPassword', 'token'))->with('error', 'Đổi mật khẩu không thành công!');
        }

        User::where("email", $updatePassword->email)->update(["password" => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email' => $updatePassword->email])->delete();
        return redirect('/login')->with('success', 'Đổi mật khẩu thành công!');
    }
}
