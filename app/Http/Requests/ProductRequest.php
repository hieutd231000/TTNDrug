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
            'dosage' => 'required',
            'route_of_use' => 'required',
            'content' => 'required',
            'product_code' => 'required|unique:products',
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
            'product_name.unique' => 'Tên sản phẩm này đã được sử dụng',
            'product_code.unique' => 'Mã sản phẩm này đã được sử dụng',
        ];
    }
}
