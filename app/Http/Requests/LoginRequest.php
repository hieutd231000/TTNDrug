<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|',
            'remember_me'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống trường này',
            'email.email' => 'Email không hợp lệ',
            'password.min' => 'Email hoặc mật khẩu không hợp lệ',
        ];
    }
}
