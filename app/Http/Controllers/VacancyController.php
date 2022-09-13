<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
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

    public function edit(Vacancy $vacancy, Request $request)
    {
        if ($request->isMethod('POST')) {
            $vacancy->title = $request->get('title');
            $vacancy->content = $request->get('content');
            $vacancy->location = $request->get('location');
            $vacancy->image = $request->get('image');
            $vacancy->type = $request->get('type');
            $vacancy->user_id = $request->get('user');
            $vacancy->company_id = $request->get('company');
            $vacancy->category_id = $request->get('category');
            $vacancy->save();

            return redirect('/vacancies');
        }

        $users = User::all();
        $companies = Company::all();
        $categories = Category::all();

        return response()->view('vacancies.form', [
            'vacancy' => $vacancy,
            'users' => $users,
            'companies' => $companies,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $users = User::all();
        $companies = Company::all();
        $categories = Category::all();

        return response()->view('vacancies.create', [
            'users' => $users,
            'companies' => $companies,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $vacancy = new Vacancy();
        $vacancy->title = $request->get('title');
        $vacancy->content = $request->get('content');
        $vacancy->image = $request->get('image');
        $vacancy->type = $request->get('type');
        $vacancy->location = $request->get('location');
        $vacancy->user_id = $request->get('user');
        $vacancy->company_id = $request->get('company');
        $vacancy->category_id = $request->get('category');

        $vacancy->save();

        return redirect('/vacancies');
    }

    public function delete(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect('/vacancies');
    }
}
