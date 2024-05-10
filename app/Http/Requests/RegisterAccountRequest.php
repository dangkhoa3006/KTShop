<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'regex:/^[^@]+@gmail\.com$/', 'unique:users,email'],
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W_]/', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được bỏ trống.',
            'name.max' => 'Họ tên không quá 100 ký tự.',
            'email.required' => 'Bắt buộc nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.regex' => 'Email phải đúng định dạng @gmail.com',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Bắt buộc nhập mật khẩu.',
            'password.confirmed' => 'Mật khẩu không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu không đúng định dạng. Mật khẩu chứa ít nhất một ký tự in hoa, một ký tự thường, một ký tự số và một ký tự đặc biệt.',
        ];
    }
}
