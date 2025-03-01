<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'value' => 'required|string',
            'anonymity' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'Значение обязательно для заполнения.',
            'value.string' => 'Значение должно быть строкой.',
            'anonymity.boolean' => 'Некорректное значение для анонимности.',
        ];
    }
}
