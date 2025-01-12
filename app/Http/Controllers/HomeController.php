<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\WorkSchedule;
use App\Models\WorkType;
use App\Models\Education;
use App\Models\Experience;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $minSalary = $request->input('min_salary');
        $sortBy = $request->input('sort_by', 'updated_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $workScheduleId = $request->input('work_schedule');
        $workTypeId = $request->input('work_type');
        $educationId = $request->input('education');
        $experienceId = $request->input('experience');

        $workSchedules = WorkSchedule::all();
        $workTypes = WorkType::all();
        $educations = Education::all();
        $experiences = Experience::all();

        $vacancies = Vacancy::with(['city', 'workType', 'workSchedule', 'education', 'experience', 'skills' => function ($query) {
            $query->take(3);
        }])
            ->withCount('skills')
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%")
                    ->orWhereHas('city', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%");
                    });
            })
            ->when($minSalary, function ($queryBuilder) use ($minSalary) {
                return $queryBuilder->where('salary', '>=', $minSalary);
            })
            ->when($workScheduleId, function ($queryBuilder) use ($workScheduleId) {
                return $queryBuilder->where('work_schedule_id', $workScheduleId);
            })
            ->when($workTypeId, function ($queryBuilder) use ($workTypeId) {
                return $queryBuilder->where('work_type_id', $workTypeId);
            })
            ->when($educationId, function ($queryBuilder) use ($educationId) {
                return $queryBuilder->where('education_id', $educationId);
            })
            ->when($experienceId, function ($queryBuilder) use ($experienceId) {
                return $queryBuilder->where('experience_id', $experienceId);
            })
            ->orderBy($sortBy, $sortOrder)
            ->paginate(20);

        return view('home', compact('vacancies', 'query', 'minSalary', 'sortBy', 'sortOrder', 'workSchedules', 'workTypes', 'educations', 'experiences'));
    }
}
