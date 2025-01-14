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
            'city_id' => 'nullable|exists:cities,id',
            'work_schedule_id' => 'nullable|exists:work_schedules,id',
            'work_type_id' => 'nullable|exists:work_types,id',
            'experience_id' => 'nullable|exists:experiences,id',
            'background_id' => 'nullable|exists:backgrounds,id',
            'detail_background' => 'nullable|string',
            'salary' => 'nullable|numeric|min:0|max:9999999',
            'detail_experience' => 'nullable|string',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ];
    }

    public function messages()
    {
        return [
            'city_id.exists' => 'Выбранный город не существует.',
            'work_schedule_id.exists' => 'Выбранное расписание работы не существует.',
            'work_type_id.exists' => 'Выбранный тип работы не существует.',
            'experience_id.exists' => 'Выбранный опыт работы не существует.',
            'background_id.exists' => 'Выбранное образование не существует.',
            'salary.numeric' => 'Зарплата должна быть числом.',
            'salary.min' => 'Зарплата должна быть не меньше 0.',
            'salary.max' => 'Зарплата не может превышать 9,999,999.',
            'skills.*.exists' => 'Некоторые выбранные навыки не существуют.',
        ];
    }
}
