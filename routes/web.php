<?php

use App\Http\Controllers\Admin\StudentController;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [StudentController::class, 'index'])->name('index');
Route::get('/displaytest', [StudentController::class, 'displaytest'])->name('displaytest');
Route::get('/displaystudentresult', [StudentController::class, 'displaystudentresult'])->name('displaystudentresult');


Route::get('/test/{id}/{title}', [StudentController::class, 'test'])->name('test');
Route::get('/viewquestion/{id}/{title}', [StudentController::class, 'viewquestion'])->name('viewquestion');
Route::get('/viewresponse/{subject}/{title}', [StudentController::class, 'viewresponse'])->name('viewresponse');
Route::post('/storerecord', [StudentController::class, 'storerecord'])->name('storerecord');
Route::get('/result/{subject}/{title}', [StudentController::class, 'result'])->name('result');





