<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Models\City;
use App\Models\WorkType;
use App\Models\Skill;
use App\Models\WorkSchedule;
use App\Models\Experience;
use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VacancyController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $query = $request->input('query');
        $minSalary = $request->input('min_salary');
        $sortBy = $request->input('sort_by', 'updated_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $workScheduleId = $request->input('work_schedule');
        $workTypeId = $request->input('work_type');
        $backgroundId = $request->input('background');
        $experienceId = $request->input('experience');

        $workSchedules = WorkSchedule::all();
        $workTypes = WorkType::all();
        $backgrounds = Background::all();
        $experiences = Experience::all();

        $vacancies = Vacancy::with(['city', 'workType', 'workSchedule', 'background', 'experience', 'skills' => function ($query) {
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
            ->when($backgroundId, function ($queryBuilder) use ($backgroundId) {
                return $queryBuilder->where('background_id', $backgroundId);
            })
            ->when($experienceId, function ($queryBuilder) use ($experienceId) {
                return $queryBuilder->where('experience_id', $experienceId);
            })
            ->orderBy($sortBy, $sortOrder)
            ->paginate(20);

        return view('vacancies.index', compact('vacancies', 'query', 'minSalary', 'sortBy', 'sortOrder', 'workSchedules', 'workTypes', 'backgrounds', 'experiences'));
    }

    public function show(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $user = $request->user();

        $userSkills = [];

        if ($user && $user->resume) {
            $userSkills = $user->resume->skills()->pluck('skills.id')->toArray();
        }

        $vacancySkills = $vacancy->skills()->pluck('skills.id')->toArray();

        $matchingSkills = array_intersect($userSkills, $vacancySkills);
        $matchingCount = count($matchingSkills);

        $totalSkills = count($vacancySkills);
        $percentage = $totalSkills > 0 ? ($matchingCount / $totalSkills) * 100 : 0;

        return view('vacancies.show', compact('vacancy', 'percentage'));
    }

    public function create()
    {
        $cities = City::all();
        $workTypes = WorkType::all();
        $skills = Skill::all();
        $workSchedules = WorkSchedule::all();
        $experiences = Experience::all();
        $backgrounds = Background::all();

        return view('vacancies.create', compact('cities', 'workTypes', 'skills', 'workSchedules', 'experiences', 'backgrounds'));
    }

    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create(array_merge($request->validated(), [
            'user_id' => $request->user()->id,
        ]));

        if ($request->has('skills')) {
            $vacancy->skills()->attach($request->input('skills'));
        }

        return redirect()->route('vacancies.show', $vacancy->id);
    }

    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('edit', $vacancy->user);

        $cities = City::all();
        $workTypes = WorkType::all();
        $skills = Skill::all();
        $workSchedules = WorkSchedule::all();
        $experiences = Experience::all();
        $background = Background::all();

        return view('vacancies.edit', compact('vacancy', 'cities', 'workTypes', 'skills', 'workSchedules', 'experiences', 'background'));
    }

    public function update(VacancyRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('edit', $vacancy->user);

        $vacancy->update($request->validated());

        if ($request->has('skills')) {
            $vacancy->skills()->sync($request->input('skills'));
        } else {
            $vacancy->skills()->detach();
        }

        return redirect()->route('vacancies.show', $vacancy->id);
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('edit', $vacancy->user);

        $vacancy->delete();

        return redirect()->route('vacancies.index');
    }
}
