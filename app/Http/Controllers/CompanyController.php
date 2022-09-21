<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    public function index(Request $request): Response
    {
        return response()->view('companies.index', [
            'companies' => Company::query()->paginate(10, ['*'], 'page')
        ]);
    }

    public function edit(Company $company)
    {
        return response()->view('companies.form', [
            'company' => $company,
        ]);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $company->fill($data);
        $company->save();

        return redirect()->route('company.index');
    }

    public function create()
    {
        return response()->view('companies.form');
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        Company::create($data);

        return redirect()->route('company.index');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }

}
