<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAdressRequest extends FormRequest
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
            'cep' => 'required|max:10',
            'street' => 'required|max:100',
            'number' => 'required|integer',
            'complement' => 'required|max:150',
            'city' => 'required|max:150',
            'uf' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'O campo CEP é obrigatório.',
            'street.required' => 'O campo Logradouro é obrigatório.',
            'number.required' => 'O campo Número é obrigatório.',
            'complement.required' => 'O campo Complemento é obrigatório.',
            'city.required' => 'O campo Cidade é obrigatório.',
            'uf.required' => 'O campo UF é obrigatório.',
            'cep.max' => 'O campo CEP é pode conter no máximo 10 caracteres.',
            'number.max' => 'O campo Logradouro pode conter no máximo 100 caracteres.',
            'number.integer' => 'O campo Número deve ser um número.',
            'complement.max' => 'O campo Complemento pode conter no máximo 150 caracteres.',
            'city.max' => 'O campo Cidade pode conter no máximo 150 caracteres.',
            'uf.max' => 'O campo UF pode conter no máximo 2 caracteres.',
        ];
    }
}
