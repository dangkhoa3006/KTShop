<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'status'=>['required']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Danh mục không được bỏ trống.',
            'name.max' => 'Danh mục không quá 100 ký tự.',
            'status.required' => 'Trạng thái không được bỏ trống.',
        ];
    }
}
