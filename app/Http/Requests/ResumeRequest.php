<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'resume.file' => 'Резюме должно быть файлом',
            'resume.mimes' => 'Резюме должно быть в формате PDF, DOC или DOCX',
            'resume.max' => 'Резюме не должно превышать 4 МБ',
        ];
    }
}
