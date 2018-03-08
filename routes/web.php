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
    return redirect('course');
});

Route::resource('course', 'CourseController')->except('show');
Route::resource('student', 'StudentController');

Route::get('/student/{student}/assign', 'StudentController@courses');
Route::post('/student/{student}/assign', 'StudentController@assignCourse');
