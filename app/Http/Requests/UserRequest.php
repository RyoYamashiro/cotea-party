<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


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
          'name' => ['required', 'max:50', 'unique:users,name,'.Auth::id().',id'],
          'email' => ['required', 'email', 'max:100', 'unique:users,email,'.Auth::id().',id'],
          'gender' => ['required'],

          'password' => 'confirmed', 'max:100', 'min:8',
          'password_confirmation' => 'same:password'

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'ユーザー名',
            'gender' => '性別',
            'birthday' => '生年月日',
            'self_introduction' => '自己紹介文',
        ];
    }
}
