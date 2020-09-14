<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'name' => 'required|string|max:60|min:3',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ];
    }
}
