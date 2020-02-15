<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email' => 'required|email|max:50|unique:users,email,'. $this->user()->id,
            'name' => 'required|max:150',
            'cpf' => 'required|max:11|unique:users,cpf,' . $this->user()->id,
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'O campo E-mail não está no formato correto.',
            'email.unique' => 'Este E-mail já está sendo utilizado.',
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo Nome pode conter no máximo 150 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.max' => 'O campo CPF pode conter no máximo 11 caracteres.',
            'cpf.unique' => 'Este CPF já está sendo utilizado.'
        ];
    }
}
