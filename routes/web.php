<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;

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


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/employer/signup', [EmployerController::class, 'signUp'])->name('signup');
Route::post('/employer/save', [EmployerController::class, 'saveEmployer'])->name('save.employer');
Route::get('/employer/login', [LoginController::class, 'login'])->name('login');
Route::get('/employer/forgotpwd', [LoginController::class, 'forgotpassword'])->name('forgot.password');
Route::get('/employer/email-verification', [LoginController::class, 'sendVerification'])->name('send.verification');    
Route::post('/empolyer/processlogin', [LoginController::class, 'processLogin'])->name('process.login');

//Forget password routes

Route::get('/forget-password', [ForgetPasswordController::class, 'getEmail']);
Route::post('/forget-password', [ForgetPasswordController::class, 'postEmail']);

Route::get('/reset-password/{token}', [ResetPasswordController::class , 'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class , 'updatePassword']);

Route::group(['middleware' => 'auth_employer'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/employer/joblist', [JobController::class, 'jobList'])->name('joblist');
    Route::get('/employer/addjob', [JobController::class, 'addJob'])->name('add.job');
    Route::post('/employer/savejob', [JobController::class, 'saveJob'])->name('save.job');
    Route::get('/employer/delete-job/{id}', [JobController::class, 'deleteJob'])->name('delete.job');
    Route::get('/employer/view-job/{id}', [JobController::class, 'viewJob'])->name('view.job');
});

