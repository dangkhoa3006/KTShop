<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'gender' => ['required'],
            'birthday' => ['required'],
            'phone' => ['required', 'regex:/^[0-9]+$/','max:10'],
            'email' => ['required', 'email', 'regex:/^[^@]+@gmail\.com$/', 'unique:users,email'],
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/[0-9]/', 'regex:/[\W_]/'],
            'province_id'=>['required'],
            'district_id'=>['required'],
            'ward_id'=>['required'],
            'address'=>['required'],
            'role'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được bỏ trống.',
            'name.max' => 'Họ tên không quá 100 ký tự.',
            'gender.required' => 'Bắt buộc chọn giới tính.',
            'birthday.required' => 'Ngày sinh không được để trổng.',
            'phone.required' => 'Bắt buộc nhập số điện thoại.',
            'phone.regex'=>'Số điện thoại không đúng định dạng.',
            'phone.max' => 'Số điện thoại chỉ tối đa 10 số.',
            'email.required' => 'Bắt buộc nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.regex' => 'Email phải đúng định dạng @gmail.com',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Bắt buộc nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => 'Mật khẩu không đúng định dạng. Mật khẩu chứa ít nhất một ký tự in hoa, một ký tự thường, một ký tự số và một ký tự đặc biệt.',
            'province_id.required'=>'Bắt buộc nhập tỉnh/thành phố.',
            'district_id.required'=>'Bắt buộc nhập quận/huyện.', 
            'ward_id.required'=>'Bắt buộc nhập phường/xã.', 
            'address.required'=>'Bắt buộc nhập địa chỉ.',
            'role.required'=>'Bắt buộc chọn chức vụ.'
        ];
    }
}
