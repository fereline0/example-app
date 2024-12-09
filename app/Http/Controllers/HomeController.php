<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $minSalary = $request->input('min_salary');
        $sortBy = $request->input('sort_by', 'updated_at');
        $sortOrder = $request->input('sort_order', 'desc');

        $vacancies = Vacancy::with(['city', 'workType'])
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
            ->orderBy($sortBy, $sortOrder)
            ->paginate(20);

        return view('home', compact('vacancies', 'query', 'minSalary', 'sortBy', 'sortOrder'));
    }
}
