<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyUserController extends Controller
{
    public function show(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $applys = $vacancy->users()->paginate(20);

        return view('vacancies.applys.show', compact('applys'));
    }

    public function store(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $user = Auth::user();

        if (!$vacancy->users()->where('user_id', $user->id)->exists()) {
            $vacancy->users()->attach($user->id);
        }

        return redirect()->back()->with('status', 'vacancy-user-created');
    }

    public function destroy(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $user = Auth::user();

        $vacancy->users()->detach($user->id);

        return redirect()->back()->with('status', 'vacancy-user-deleted');
    }
}