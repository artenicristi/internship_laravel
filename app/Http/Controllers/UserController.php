<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->view('users.index', [
            'users' => User::query()->paginate(10, ['*'], 'page')
        ]);
    }
}
