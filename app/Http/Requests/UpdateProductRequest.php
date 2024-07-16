<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'image' => ['mimes:png,jpg,bmp,gif'],
            'name' => ['required', 'max:100'],
            'description' => ['required'],
            // 'price' => ['required'],
            //'sale_price' => ['required'],
            //'quantity' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'status' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được bỏ trống.',
            'name.max' => 'Họ tên không quá 100 ký tự.',
            'description.required' => 'Mô tả sản phẩm không được bỏ trống.',
            // 'specification.required' => 'Thông số kỹ thuật sản phẩm không được bỏ trống.',
            // 'price.required' => 'Giá bán không được bỏ trống.',
            // 'sale_price.required' => 'Giá khuyến mãi không được bỏ trống.',
            // 'quantity.required' => 'Số lượng sản phẩm không được bỏ trống.',
            'category_id.required' => 'Bắt buộc chọn danh mục.',
            'subcategory_id.required' => 'Bắt buộc chọn loại sản phẩm.',
            'status.required' => 'Tình trạng không được bỏ trống.',
        ];
    }
}
