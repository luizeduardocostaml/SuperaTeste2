<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|max:60',
            'name' => 'required|max:150',
            'cpf' => 'required|unique:users|max:11',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'O campo Senha é obrigatório.',
            'password.max' => 'O campo Senha pode conter no máximo 60 caracteres.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
            'email.max' => 'O campo E-mail pode conter no máximo 50 caracteres.',
            'email.unique' => 'Este E-mail já está sendo utilizado.',
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo Nome pode conter no máximo 150 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.max' => 'O campo CPF pode conter no máximo 11 caracteres.',
            'cpf.unique' => 'Este CPF já está sendo utilizado.'
        ];
    }
}
