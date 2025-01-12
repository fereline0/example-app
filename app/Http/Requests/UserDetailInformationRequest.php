<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailInformationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'about' => 'nullable|string',
            'gender' => 'nullable|in:male,female,none',
            'birthday' => 'nullable|date',
            'phone_number' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'about.string' => 'О себе должно быть строкой.',
            'gender.in' => 'Пол должен быть одним из следующих: male, female, none.',
            'birthday.date' => 'Дата рождения должна быть корректной датой.',
            'phone_number.string' => 'Номер телефона должен быть строкой.',
            'resume.file' => 'Резюме должно быть файлом.',
            'resume.mimes' => 'Резюме должно быть в формате PDF, DOC или DOCX.',
            'resume.max' => 'Резюме не должно превышать 2 МБ.',
        ];
    }
}
