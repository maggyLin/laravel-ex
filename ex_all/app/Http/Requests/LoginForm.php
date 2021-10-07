<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordStrength;

class LoginForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        // 預設為 false，如果不需要授權驗證(其他middleware已經處理)，要改為 true
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
            'account' => 'required|between:4,15',
            'password' => ['required'],
            // 'password' => ['required', new PasswordStrength(6)],
        ];
    }

    public function messages(){
        return [
            'between' => '帳號或密碼錯誤',
        ];
    }
}
