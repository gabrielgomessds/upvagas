<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterCorporateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', Rule::unique('users', 'email')],
            'password' => ($this->input('action') === 'update') ? 'nullable' : 'required|min:8',
            'type' => ['required', 'string'],
            'photo' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome precisa ser preenchido',
            'email.required' => 'O campo e-mail precisa ser preenchido',
            'email.email' => 'O formato inserido não é válido',
            'email.unique' => 'O email inserido já está cadastrado',
            'password.required' => 'O campo senha precisa ser preenchido',
            'type.required' => 'Escolha uma opção',
        ];
    }
}
