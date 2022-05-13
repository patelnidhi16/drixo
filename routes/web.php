<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\LinkedinController;
use App\Mail\ApproveMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('front.layouts.master');
    // return view('welcome');
});
// Route::get('/index', function () {
//     return view('front.layouts.master');
// });


Auth::routes();
Route::get('/index', [StudentController::class, 'index'])->name('index');

Route::group(['middleware' => 'auth:web'], function () {
   
    Route::get('/displaytest', [StudentController::class, 'displaytest'])->name('displaytest');
    Route::get('/displaystudentresult', [StudentController::class, 'displaystudentresult'])->name('displaystudentresult');
    Route::get('/test/{id}/{title}', [StudentController::class, 'test'])->name('test');
    Route::get('/viewquestion/{id}/{title}', [StudentController::class, 'viewquestion'])->name('viewquestion');
    Route::get('/viewresponse/{subject}/{title}', [StudentController::class, 'viewresponse'])->name('viewresponse');
    Route::post('/storerecord', [StudentController::class, 'storerecord'])->name('storerecord');
    Route::get('/result/{subject}/{title}', [StudentController::class, 'result'])->name('result');
    Route::get('/viewresult', [StudentController::class, 'viewresult'])->name('viewresult');
    Route::get('/downloadresult', [StudentController::class, 'downloadresult'])->name('downloadresult');
    Route::get('/pdf', [StudentController::class, 'pdf'])->name('pdf');
    Route::get('/about', [StudentController::class, 'about'])->name('about');
});    

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');


Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::get('auth/linkedin', [LinkedinController::class, 'redirectToLinkedin']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'handleCallback']);

Route::get('auth/github', [GithubController::class, 'redirectToGithub']);
Route::get('auth/github/callback', [GithubController::class, 'handleCallback']);
