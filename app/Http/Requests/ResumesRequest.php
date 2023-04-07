<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumesRequest extends FormRequest
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
            'phone' => ['required', 'string'],
            'localization' => ['required', 'string'],
            'description' => ['required', 'string'],
            'formations' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'qualifications' => ['required', 'string'],
            'skills' => ['required', 'string'],
            'languages' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Usuário não encontrado',
            'phone.required' => 'O campo telefone precisa ser preenchido',
            'description.required' => 'O campo descrição precisa ser preenchido',
            'localization.required' => 'O campo localizações precisa ser preenchido',
            'formations.required' => 'O campo formações precisa ser preenchido',
            'experience.required' => 'O campo experiências precisa ser preenchido',
            'qualifications.required' => 'O campo qualificações precisa ser preenchido',
            'skills.required' => 'O campo habilidades precisa ser preenchido',
            'languages.required' => 'O campo linguagens precisa ser preenchido',
        ];
    }
}
