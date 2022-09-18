<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(Request $request): Response
    {
        return response()->view('companies.index', [
            'companies' => Company::query()->paginate(10, ['*'], 'page')
        ]);
    }

    public function edit(Request $request, Company $company)
    {
        if ($request->isMethod('POST')) {
//            Validator::validate($request->only(['name']), [
//                'name' => 'required|max:255',
//                'website' => 'required|max:255',
//            ]);

            dd($request);
            $company->name = $request->get('name');
            $company->website = $request->get('website');
            $company->user_id = $request->user()->id;
            $company->save();

            return redirect('/companies');
        }

        return response()->view('companies.form', [
            'company' => $company,
        ]);
    }

    public function create()
    {
        return response()->view('companies.create');
    }

    public function store(Request $request)
    {
        //@fixme check user auth
        $company = new Company();
        $company->name = $request->get('name');
        $company->website = $request->get('website');
        $company->user_id = $request->user()->id;

        $company->save();

        return redirect('/companies');
    }

    public function delete(Company $company)
    {
        $company->delete();
        return redirect('/companies');
    }

}
