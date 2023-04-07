<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanysRequest extends FormRequest
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
            'user_id' => ($this->input('action') === 'update') ? 'nullable' : 'required',
            'name' => ['required', 'string'],
            'about' => ['required', 'string'],
            'photo' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Usuário não encontrado',
            'name.required' => 'O campo nome precisa ser preenchido',
            'about.required' => 'O campo sobre precisa ser preenchido',
        ];
    }
}
