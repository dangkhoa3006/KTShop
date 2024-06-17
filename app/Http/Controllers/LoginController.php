<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showForm()
    {
        return view("login");
    }
    /**
     * Handle an authentication attempt.
     */

     public function authenticate(Request $request): RedirectResponse
     {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ],
             [
                 'email.required' => 'Bắt buộc nhập email.',
                 'email.email' => 'Email không hợp lệ.',
                 'password.required' => 'Bắt buộc nhập mật khẩu.',
             ]
         );
 
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
 
             // Lấy đối tượng người dùng đã đăng nhập
             $user = Auth::user();
             //Kiểm tra trạng thái người dùng
            //  if ($user->status == 0) {
            //      Auth::logout();
            //      return redirect()->route('login')->with('warning', 'Vui lòng kiểm tra email của bạn.');
            //  }
             // Kiểm tra role của người dùng
             if ($user->role == 2) {
                 return redirect('/');
             } elseif (in_array($user->role, [0, 1])) {
                 return redirect()->intended('/admin/dashboard');
             } 
         }
 
         return back()->withErrors([
             'email' => 'Thông tin đăng nhập không chính xác.',
             'password' => 'Thông tin đăng nhập không chính xác.',
         ])->onlyInput('email', 'password');
     }
     

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        $user = Auth::user();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        //Nếu là người dùng khi đăng xuất sẽ trở về trang home, còn admin với nhân viên khi đăng xuất sẽ về trang login
        if ($user->role == 2) {
            return redirect('/');
        } elseif (in_array($user->role, [0, 1])) {
            return redirect('/login');
        }
        return redirect('/login');
    }
}
