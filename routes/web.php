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

Route::get('students/in_session', 'DashboardController@in_session');
Route::get('students/suspended', 'DashboardController@suspended');
Route::get('students/expelled', 'DashboardController@expelled');

Route::post('/student/search', 'DashboardController@student_search');
Route::get('/student/restrictDuplicate', 'DashboardController@restrictDuplicate');

#Exams URLs
Route::get('/exams','DashboardController@exams_results');
Route::get('/exam/{id}/edit','DashboardController@exams_edit');
Route::post('/exam/{id}/update','DashboardController@exams_update');




Route::get('/exams/add','DashboardController@exam_add');
Route::post('/exams/store','DashboardController@exam_store');
Route::get('/exams/add/units/{id}','DashboardController@exam_units_add');
Route::post('/exams/add/units/{id}/store','DashboardController@exam_units_store');
Route::get('/delete_exam/{id}', 'DashboardController@delete_exam');

Route::get('/exam/restrictDuplicate', 'DashboardController@exam_restrictDuplicate');

#Students Financials URLs
Route::get('/financials', 'DashboardController@financials_show');
Route::get('/financials/add', 'DashboardController@financials_add');
Route::post('/financials/store', 'DashboardController@financials_store');
Route::get('/financials/{id}/edit', 'DashboardController@financials_edit');
Route::post('/financials/{id}/update', 'DashboardController@financials_update');

Route::get('/financials/getStudent/{id}', 'DashboardController@getFinancialInfo');

#Student Discipline URLs
Route::get('/discipline', 'DashboardController@discipline_show');
Route::get('/discipline/{id}/edit', 'DashboardController@discipline_edit');
Route::post('/discipline/{id}/update', 'DashboardController@discipline_update');


#Updates URLs
Route::get('/updates', 'DashboardController@updates_show');
Route::get('/updates/add', 'DashboardController@updates_add');
Route::post('/updates/store', 'DashboardController@updates_store');
Route::get('/updates/{id}/edit', 'DashboardController@updates_edit');
Route::post('/updates/{id}/update', 'DashboardController@updates_update');
Route::get('/updates/{id}/delete', 'DashboardController@updates_delete');


Route::post('/api/ussd','USSDController@index');
Route::get('/sendMessage/{id}', 'SMSController@test');


Route::get('/print/allStudents','ExportExcelController@allStudents');
Route::get('/print/academicReports','ExportExcelController@academicReports');

Route::get('/test', 'DashboardController@test');