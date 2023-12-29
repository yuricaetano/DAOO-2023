<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
            'rua' => 'required | min:6',
            'numero' => 'required | numeric | min:1'
        ];
    }

    public function messages()
    {
        return [
            'rua.required' => 'A rua é obrigatorio',
            'rua.min' => 'A rua não pode ter menos de 6 caracter amigo'
        ];
    }
}
