<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\EmployeeController;
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

/***Admin Section ****/
Route::resource('admin', AdminController::class)->middleware('mustBeAdmin');
//appraisal
Route::get('admin_appraisal', [AdminController::class, 'appraisal'])->name('admin.appraisal');
Route::post('admin_appraisal_store', [AdminController::class, 'appraisalStore'])->name('admin.appraisalStore');

Route::resource('appraisal', AppraisalController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
