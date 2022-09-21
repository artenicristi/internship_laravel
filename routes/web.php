<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('welcome'));
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/{category}', [CategoryController::class, 'edit'])->name('category.edit');

Route::group(['prefix' => '/companies', 'middleware' => 'auth'], function() {
    Route::get('', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/create', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/{company}', [CompanyController::class, 'delete'])->name('company.delete');
});

Route::group(['prefix' => '/vacancies', 'middleware' => 'auth'], function() {
    Route::get('', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/create', [VacancyController::class, 'create'])->name('vacancy.create');
    Route::post('/create', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::post('/{vacancy}', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::delete('/{vacancy}', [VacancyController::class, 'delete'])->name('vacancy.delete');
});

Route::get('/admin/users', [UserController::class, 'index'])->middleware(['auth', 'admin'])->name('users.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

