<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(?User $user)
    {
//        return $user !== null;
        dump('create');
        return auth()->check();
    }

    public function edit(?User $user, Vacancy $vacancy)
    {
        return auth()->check() && $this->update($user, $vacancy);
    }

    public function update(?User $user, Vacancy $vacancy)
    {
        return auth()->check() && $vacancy->user->id == $user->id;
    }

    public function delete(?User $user, Vacancy $vacancy)
    {
        return auth()->check() && $vacancy->user->id == $user->id;
    }


}
