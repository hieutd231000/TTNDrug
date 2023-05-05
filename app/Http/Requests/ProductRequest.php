<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required|unique:products|max:64',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price_unit' => 'required|numeric|min:1000',
            'product_code' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'unique' => 'Tên sản phẩm này đã được sử dụng',
            'numeric' => 'Không đúng định dạng',
            'min' => 'Giá/đơn vị phải lớn hơn 1000 VNĐ'
        ];
    }
}
