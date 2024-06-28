<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^[0-9]+$/','max:10'],
            'email' => ['required', 'email', 'regex:/^[^@]+@gmail\.com$/'],
            'delivery' => 'required|string|in:home,shop',
            'province_id' => 'nullable|exists:provinces,id',
            'district_id' => 'nullable|exists:districts,id',
            'ward_id' => 'nullable|exists:wards,id',
            'address' => 'nullable|string|max:500',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Bắt buộc nhập tên người dùng.',
            'phone.required' => 'Bắt buộc nhập số điện thoại.',
            'phone.regex'=>'Số điện thoại không đúng định dạng.',
            'phone.max' => 'Số điện thoại chỉ tối đa 10 số.',
            'email.required' => 'Bắt buộc nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.regex' => 'Email phải đúng định dạng @gmail.com',
        ];
    }
}
