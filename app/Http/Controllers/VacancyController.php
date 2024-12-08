<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use App\Models\City;
use App\Models\WorkType;
use App\Models\Skill;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
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
        return view('vacancies.create', compact('cities', 'workTypes', 'skills'));
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
        $cities = City::all();
        $workTypes = WorkType::all();
        $skills = Skill::all();
        return view('vacancies.edit', compact('vacancy', 'cities', 'workTypes', 'skills'));
    }

    public function update(VacancyRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
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
        $vacancy->delete();

        return redirect()->route('home');
    }
}
