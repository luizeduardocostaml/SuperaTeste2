<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginUserRequest extends FormRequest
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
            'email' => 'required|email|max:50',
            'password' => 'required|max:60',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'O campo Senha é obrigatório.',
            'password.max' => 'O campo Senha pode conter no máximo 60 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
            'email.max' => 'O campo E-mail pode conter no máximo 50 caracteres.'
        ];
    }
}
