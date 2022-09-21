<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacancyRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VacancyController extends Controller
{
    public function index(): Response
    {
        return response()->view('vacancies.index', [
            'vacancies' => Vacancy::query()->paginate(10, ['*'], 'page')
        ]);
    }

    public function edit(Vacancy $vacancy)
    {
        $this->authorize('edit', $vacancy);

        return response()->view('vacancies.form', [
            'vacancy' => $vacancy,
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }

    public function update(CreateVacancyRequest $request, Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $vacancy->fill($data);
        $vacancy->save();

        return redirect()->route('vacancy.index');
    }

    public function create()
    {
        $this->authorize('vacancy_create');

        return response()->view('vacancies.form', [
            'companies' => Company::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(CreateVacancyRequest $request)
    {
        $this->authorize('vacancy_create');

        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        Vacancy::create($data);

        return redirect()->route('vacancy.index');
    }

    public function delete(Vacancy $vacancy)
    {
        $this->authorize('delete', $vacancy);

        $vacancy->delete();
        return redirect()->route('vacancy.index');
    }
}
