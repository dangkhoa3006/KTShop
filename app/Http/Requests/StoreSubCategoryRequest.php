<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'name' => ['required', 'max:100', 'unique:subcategories,name'],
            'category_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Loại sản phẩm không được bỏ trống.',
            'name.max' => 'Loại sản phẩm không quá 100 ký tự.',
            'name.unique' => 'Loại sản phẩm đã tồn tại.',
            'category_id.required' => 'Danh mục không được bỏ trống',
        ];
    }
}
