<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string | max:50',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.require' => 'O nome é obrigatorio',
            'name.max' => 'o nome deve ter no max 50 caracter',
            'email.email' => 'informe um email valido',
            'email.unique' => 'este email ja esta cadastrado',
            'password.min' => 'a senha deve ter 8 caracter',
            'password.required' => 'a senha é obrigatoria',
            'role.required' => 'a função é obrigatoria'
        ];
    }
}
