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
Route::get('/rubrics/', 'RubricsController@index')->name('show_rubrics');
Route::get('/question/{id}/', 'QuestionsController@show');
Route::get('/questions/{rubric_id?}/', 'QuestionsController@index');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('question/{id}/', 'Admin\QuestionsController@show');
    Route::get('rubrics/', 'Admin\RubricsController@index');
});

