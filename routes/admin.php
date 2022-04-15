<?php

use App\Http\Controllers\Admin\ForgetformController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Admin\StudentController;
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
    Route::get('assigntest', [StudentController::class, 'assigntest'])->name('assigntest');
    Route::get('student', [StudentController::class, 'student'])->name('student');
    // Route::get('status', [StudentController::class, 'status']);
    // Route::get('approve', [StudentController::class, 'approve'])->name('approve');

    Route::get('subject', [StudentController::class, 'subject'])->name('subject');
    Route::post('subject', [StudentController::class, 'addsubject'])->name('addsubject');
    Route::get('displaysubject', [StudentController::class, 'displaysubject'])->name('displaysubject');
    Route::get('delete', [StudentController::class, 'delete'])->name('delete');
    Route::get('edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('update', [StudentController::class, 'update'])->name('update');
    Route::get('questions/{id}', [StudentController::class, 'questions'])->name('questions');
    Route::get('question', [StudentController::class, 'question'])->name('question');
    Route::post('questions/{id}', [StudentController::class, 'storequestions']);
    Route::get('questionlist/{id}', [StudentController::class, 'questionlist'])->name('questionlist');
    Route::get('editquestion', [StudentController::class, 'editquestion'])->name('editquestion');
    Route::post('updatequestion', [StudentController::class, 'updatequestion'])->name('updatequestion');
    Route::get('alltest/{id}', [StudentController::class, 'alltest'])->name('alltest');
    Route::get('display_title/{id}/{title}', [StudentController::class, 'display_title'])->name('display_title');
    Route::get('assign_test', [StudentController::class, 'assign_test'])->name('assign_test');
    Route::get('attempt_test', [StudentController::class, 'attempt_test'])->name('attempt_test');
    Route::get('assigntest_list', [StudentController::class, 'assigntest_list'])->name('assigntest_list');
    Route::get('notattempt_test', [StudentController::class, 'notattempt_test'])->name('notattempt_test');
    Route::get('return_result', [StudentController::class, 'return_result'])->name('return_result');
    Route::get('select_subject', [StudentController::class, 'select_subject'])->name('select_subject');
    Route::get('select_title', [StudentController::class, 'select_title'])->name('select_title');
    Route::get('result', [StudentController::class, 'result'])->name('result');
    Route::get('/displayresult', [StudentController::class, 'displayresult'])->name('displayresult');
    Route::get('/all', [StudentController::class, 'all'])->name('all');
    Route::get('/subjectdetail/{id}', [StudentController::class, 'subjectdetail'])->name('subjectdetail');
});
