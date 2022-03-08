<?php

use App\Http\Controllers\Admin\ForgetformController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\SendEmailController;


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
      

});


