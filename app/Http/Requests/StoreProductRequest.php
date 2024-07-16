<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'image' => ['required', 'mimes:png,jpg,bmp,gif'],
            'name' => ['required', 'max:100','unique:products,name'],
            'description' => ['required'],
            // 'price' => ['required'],
            //'sale_price' => ['required'],
            //'quantity' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Ảnh sản phẩm không được bỏ trống.',
            'name.required' => 'Tên sản phẩm không được bỏ trống.',
            'name.max' => 'Tên sản phẩm không quá 100 ký tự.',
            'name.unique' => 'Sản phẩm đã tồn tại.',
            'description.required' => 'Mô tả sản phẩm không được bỏ trống.',
            // 'price.required' => 'Giá bán không được bỏ trống.',
            //'sale_price.required' => 'Giá khuyến mãi không được bỏ trống.',
            //'quantity.required' => 'Số lượng sản phẩm không được bỏ trống.',
            'category_id.required' => 'Bắt buộc chọn danh mục.',
            'subcategory_id.required' => 'Bắt buộc chọn loại sản phẩm.',
        ];
    }
}
