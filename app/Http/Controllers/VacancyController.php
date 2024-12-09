<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Models\City;
use App\Models\WorkType;
use App\Models\Skill;
use App\Models\WorkSchedule;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VacancyController extends Controller
{
    use AuthorizesRequests;

    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.show', compact('vacancy'));
    }

    public function create()
    {
        $cities = City::all();
        $workTypes = WorkType::all();
        $skills = Skill::all();
        $workSchedules = WorkSchedule::all();
        $experiences = Experience::all();
        $education = Education::all();

        return view('vacancies.create', compact('cities', 'workTypes', 'skills', 'workSchedules', 'experiences', 'education'));
    }

    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create(array_merge($request->validated(), [
            'user_id' => $request->user()->id,
        ]));

        if ($request->has('skills')) {
            $vacancy->skills()->attach($request->input('skills'));
        }

        return redirect()->route('vacancies.show', $vacancy->id)->with('status', 'vacancy-created');
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
        $education = Education::all();

        return view('vacancies.edit', compact('vacancy', 'cities', 'workTypes', 'skills', 'workSchedules', 'experiences', 'education'));
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

        return redirect()->route('vacancies.show', $vacancy->id)->with('status', 'vacancy-updated');
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('edit', $vacancy->user);

        $vacancy->delete();

        return redirect()->route('home');
    }
}
