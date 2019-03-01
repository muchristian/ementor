<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function() {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('auth.adminLogin');
    Route::post('/', 'Auth\AdminLoginController@login')->name('auth.adminLogin');
    Route::get('/dashboard', 'AdminController@index')->name('admin.home');
});

    Route::get('/mentor', 'MentorController@index')->name('mentor.home')->middleware('auth','mentor');


    Route::get('/student', 'StudentController@index')->name('student.home')->middleware('auth','student');
