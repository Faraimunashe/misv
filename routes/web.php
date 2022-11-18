<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:project']], function () {
    Route::get('/p-manager/dashboard', 'App\Http\Controllers\project\DashboardController@index')->name('admin-dashboard');

    Route::get('/p-manager/projects', 'App\Http\Controllers\project\ProjectController@index')->name('admin-projects');
    Route::get('/p-manager/create-project', 'App\Http\Controllers\project\ProjectController@create_project')->name('admin-project-create');
    Route::get('/p-manager-create-project', 'App\Http\Controllers\project\ProjectController@create')->name('admin-create-project');
});

Route::group(['middleware' => ['auth', 'role:finance']], function () {
    Route::get('/finance/dashboard', 'App\Http\Controllers\finance\DashboardController@index')->name('finance-dashboard');

    Route::get('/Expenses', 'App\Http\Controllers\finance\FinanceController@index')->name('finance-expenses');
    Route::get('/create-expense', 'App\Http\Controllers\finance\FinanceController@create-expense')->name('finance-create-expense');
    Route::get('/expense-create', 'App\Http\Controllers\finance\FinanceController@create')->name('create-project');
});

require __DIR__.'/auth.php';
