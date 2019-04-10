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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('index');
Route::get('/student', 'DashboardController@students_show');

#Students Personal Information URLs
Route::get('/student/add', 'DashboardController@student_add');
Route::post('/student/store', 'DashboardController@student_store');
Route::get('/student/{id}/edit', 'DashboardController@student_edit');
Route::post('/student/{id}/update', 'DashboardController@student_update');

#Students Financials URLs
Route::get('/financials', 'DashboardController@financials_show');
Route::get('/financials/add', 'DashboardController@financials_add');
Route::post('/financials/store', 'DashboardController@financials_store');
Route::get('/financials/{id}/edit', 'DashboardController@financials_edit');
Route::post('/financials/{id}/update', 'DashboardController@financials_update');

Route::get('/financials/add/{id}', 'DashboardController@getFinancialInfo');

#Student Discipline URLs
Route::get('/discipline', 'DashboardController@discipline_show');

Route::get('/test', 'DashboardController@test');