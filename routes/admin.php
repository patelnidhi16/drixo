<?php

use App\Http\Controllers\Admin\ForgetformController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\admin\StudentController;
    # Login Routes
    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
    Route::post('logout',   'LoginController@logout')->name('logout');
    Route::get('forgetmail', [SendEmailController::class, 'formview'])->name('forgetmail');
    Route::post('forgetmail', [SendEmailController::class, 'forgetmail']);
    Route::get('forget', [ForgetformController::class, 'showform'])->name('forget');
    Route::post('forget', [ForgetformController::class, 'forgetform']);
    Route::get('change',    'ChangeController@changeform')->name('change');
    Route::post('change',    'ChangeController@change');
    Route::get('reset',     'ResetController@showreset')->name('reset');
    Route::post('reset',     'ResetController@reset');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('/calander', function () {
            return view('admin.calander');
        })->name('calander');
    Route::get('student',[StudentController::class,'student'])->name('student');
    Route::get('status', [StudentController::class, 'status']);
    Route::get('approve', [StudentController::class, 'approve'])->name('approve');
   
    Route::get('subject', [StudentController::class, 'subject'])->name('subject');
    Route::post('subject', [StudentController::class, 'addsubject'])->name('addsubject');
    Route::get('displaysubject', [StudentController::class, 'displaysubject'])->name('displaysubject');
    Route::get('delete', [StudentController::class, 'delete'])->name('delete');
    Route::get('edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('update', [StudentController::class, 'update'])->name('update');
    Route::get('question', [StudentController::class, 'question'])->name('question');
    Route::post('question', [StudentController::class, 'storequestion']);
    Route::get('questions/{id}', [StudentController::class, 'questions'])->name('questions');
    Route::post('questions/{id}', [StudentController::class, 'storequestions']);
    Route::get('displayquestion', [StudentController::class, 'displayquestion'])->name('displayquestion');
});
