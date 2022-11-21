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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:project']], function () {
    Route::get('/p-manager/dashboard', 'App\Http\Controllers\project\DashboardController@index')->name('admin-dashboard');

    Route::get('/p-manager/projects', 'App\Http\Controllers\project\ProjectController@index')->name('admin-projects');
    Route::get('/p-manager/create-project', 'App\Http\Controllers\project\ProjectController@create_project')->name('admin-project-create');
    Route::get('/p-manager/project/{product_id}', 'App\Http\Controllers\project\ProjectController@project')->name('admin-project');
    Route::post('/p-manager-create-project', 'App\Http\Controllers\project\ProjectController@create')->name('admin-create-project');

    Route::get('/p-manager/employees', 'App\Http\Controllers\project\EmployeeController@index')->name('admin-employees');
    Route::get('/p-manager/add-employee', 'App\Http\Controllers\project\EmployeeController@add_employee')->name('admin-add-employee');
    Route::post('/p-manager/employee-add', 'App\Http\Controllers\project\EmployeeController@add_employee')->name('admin-employee-add');
    Route::get('/p-manager/employee/{employee_id}', 'App\Http\Controllers\project\EmployeeController@employee')->name('admin-employee');

    Route::any('comment/employee/{employee_id}', 'App\Http\Controllers\project\EmployeeController@comment')->name('admin-comment-employee');
});

Route::group(['middleware' => ['auth', 'role:finance']], function () {
    Route::get('/finance/dashboard', 'App\Http\Controllers\finance\DashboardController@index')->name('finance-dashboard');

    Route::get('/resources', 'App\Http\Controllers\finance\FinanceController@index')->name('finance-expenses');
    Route::get('/create-resource', 'App\Http\Controllers\finance\FinanceController@create_resource')->name('finance-create-expense');
    Route::post('/resource-create', 'App\Http\Controllers\finance\FinanceController@create')->name('create-resource');
});

require __DIR__.'/auth.php';
