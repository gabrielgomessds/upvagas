<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacanciesRequest extends FormRequest
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
            'company_id' => ['required', 'int'],
            'category_id' => ['required', 'int'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'qualifications' => ['required', 'string'],
            'salary_intro' => ['required', 'string'],
            'salary_final' => ['required', 'string'],
            'quantity' => ['required', 'string'],
            'localization' => ['required', 'string'],
            'qualifications' => ['required', 'string'],
            'model' => ['required', 'string'],
            'time' => ['required', 'string'],
            'hiring_type' => ['required', 'string'],
            'level' => ['required', 'string'],
            'situation' => ($this->input('action') === 'create') ? 'nullable' : 'required',
            'slug' => 'nullable' ,
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Empresa não encontrado',
            'category_id.required' => 'O campo categoria precisa ser preenchido',
            'title.required' => 'O campo titulo precisa ser preenchido',
            'description.required' => 'O campo descrição precisa ser preenchido',
            'description.required' => 'O campo descrição precisa ser preenchido',
            'salary_intro.required' => 'O campo salario inicial precisa ser preenchido',
            'salary_final.required' => 'O campo salario final precisa ser preenchido',
            'quantity.required' => 'O campo quantidade precisa ser preenchido',
            'qualifications.required' => 'O campo qualificação precisa ser preenchido',
            'localization.required' => 'O campo localização precisa ser preenchido',
            'skills.required' => 'O campo habilidades precisa ser preenchido',
            'model.required' => 'O campo modelo precisa ser preenchido',
            'time.required' => 'O campo tempo precisa ser preenchido',
            'hiring_type.required' => 'O campo tipo de contratação precisa ser preenchido',
            'level.required' => 'O campo nivel precisa ser preenchido',
        ];
    }
}
