<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|max:64',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Không được để trống trường này',
            'unique' => 'Tên danh mục này đã được sử dụng'
        ];
    }
}
