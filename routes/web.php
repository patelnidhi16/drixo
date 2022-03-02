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
Route::get('/master', function () {
    return view('layouts.master');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/login', function () {
    return view('login');
});

Route::get('/calander', function () {
    return view('calander');
})->name('calander');