<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request): Response
    {
        return response()->view('categories.index', [
            'categories' => Category::query()->paginate(10, ['*'], 'page')
        ]);
    }

    public function edit(Category $category, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            Validator::validate($request->only(['name']), [
                'name' => 'required|max:255'
            ]);

            $category->name = $request->get('name');
            $category->save();
        }

        return response()->view('categories.form', [
            'category' => $category
        ]);
    }
}
