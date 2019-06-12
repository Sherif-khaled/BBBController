<?php

namespace BBBController\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|min:3|max:20",
            "email" => "unique:users|required|email",
            "password" => "required|min:6|max:15"
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',

        ];
    }
}
