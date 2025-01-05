<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'work_type_id' => 'required|exists:work_types,id',
            'salary' => 'required|numeric|min:0',
            'work_schedule_id' => 'required|exists:work_schedules,id',
            'experience_id' => 'required|exists:experiences,id',
            'education_id' => 'required|exists:education,id',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название обязательно для заполнения.',
            'title.string' => 'Название должно быть строкой.',
            'title.max' => 'Название не должно превышать 255 символов.',
            'description.required' => 'Описание обязательно для заполнения.',
            'description.string' => 'Описание должно быть строкой.',
            'city_id.required' => 'Город обязателен для заполнения.',
            'city_id.exists' => 'Выбранный город не существует.',
            'work_type_id.required' => 'Тип работы обязателен для заполнения.',
            'work_type_id.exists' => 'Выбранный тип работы не существует.',
            'salary.required' => 'Зарплата обязательна для заполнения.',
            'salary.numeric' => 'Зарплата должна быть числом.',
            'salary.min' => 'Зарплата должна быть не меньше 0.',
            'work_schedule_id.required' => 'График работы обязателен для заполнения.',
            'work_schedule_id.exists' => 'Выбранный график работы не существует.',
            'experience_id.required' => 'Опыт работы обязателен для заполнения.',
            'experience_id.exists' => 'Выбранный опыт работы не существует.',
            'education_id.required' => 'Образование обязательно для заполнения.',
            'education_id.exists' => 'Выбранное образование не существует.',
            'skills.array' => 'Навыки должны быть массивом.',
            'skills.*.exists' => 'Один или несколько выбранных навыков не существуют.',
        ];
    }
}
