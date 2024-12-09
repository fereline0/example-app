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
}
