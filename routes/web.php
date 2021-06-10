<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\KpiController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.index');
});
/**Employee Section ****/
Route::resource('employee', EmployeeController::class)->middleware('mustBeEmployee');
//change password
Route::get('employee_password', [EmployeeController::class, 'password'])->name('employee.password');
Route::post('employee_password_store', [EmployeeController::class, 'passwordStore'])->name('employee.passwordStore');
Route::get('employee_goals', [EmployeeController::class, 'goals'])->name('employee.goals');
Route::post('employee_goals', [EmployeeController::class, 'goalsStore'])->name('employee.goals');


/***Admin Section ****/
Route::resource('admin', AdminController::class)->middleware('mustBeAdmin');
Route::get('admin_kpi', [AdminController::class, 'kpi'])->name('admin.kpi');
Route::post('admin_kpi-store', [AdminController::class, 'kpiStore'])->name('admin.kpiStore');
Route::get('admin_kpi-grade/{id}', [AdminController::class, 'grade'])->name('admin.grade');
Route::post('admin_kpi-grade', [AdminController::class, 'gradeStore'])->name('admin.gradeStore');
Route::get('admin_report', [AdminController::class, 'report'])->name('admin.report');
Route::get('view_appraisals', [AdminController::class, 'viewAppraisals'])->name('admin.viewAppraisals');



//appraisal
Route::get('admin_appraisal', [AdminController::class, 'appraisal'])->name('admin.appraisal');
Route::post('admin_appraisal_store', [AdminController::class, 'appraisalStore'])->name('admin.appraisalStore');
Route::post('admin_upload_files', [AdminController::class, 'upload'])->name('admin.upload');

Route::resource('appraisal', AppraisalController::class);
Route::resource('goal', GoalController::class);
Route::resource('kpi', KpiController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
