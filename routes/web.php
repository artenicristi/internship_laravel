<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\VacancyTestController;
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

Route::group(['prefix' => '/companies'], function() {
    Route::get('', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/create', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::delete('/{company}', [CompanyController::class, 'delete'])->name('company.delete');
});

Route::group(['prefix' => '/vacancies'], function() {
    Route::get('', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/create', [VacancyController::class, 'create'])->name('vacancy.create');
    Route::post('/create', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/{vacancy}', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::post('/{vacancy}', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::delete('/{vacancy}', [VacancyController::class, 'delete'])->name('vacancy.delete');
});
