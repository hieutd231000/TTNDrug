<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Không được để trống trường này',
            'password.min' => 'Sử dụng 6 ký tự trở lên cho mật khẩu của bạn',
            'password_confirmation.same' => 'Mật khẩu không trùng khớp',
        ];
    }
}
