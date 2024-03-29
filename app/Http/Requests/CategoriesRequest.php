<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'icon' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo titulo precisa ser preenchido',
            'icon.required' => 'O campo icone precisa ser preenchido',
        ];
    }
}
