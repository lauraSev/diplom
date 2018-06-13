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
Route::get('/', 'RubricsController@index')->name('user-index');
Route::view('/question/add-success/', 'question-add-success', [])->name('question-add-success');
Route::get('/questions/{id}/', 'QuestionsController@index')->name('user-rubric-view');

Route::match(['get', 'post'],'rubrics/add/{rubric_id?}', 'QuestionsController@add')->name('user-question-add');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth','can:accessAdminpanel'])->group(function () {

    Route::get('rubrics/', 'Admin\RubricsController@index')->name('rubric-index');
    Route::any('rubrics/add/', 'Admin\RubricsController@add')->name('rubric-add');
    Route::get('rubric/delete/{id}/', 'Admin\RubricsController@delete')->name('rubric-delete');
    Route::any('rubric/edit/{id}/', 'Admin\RubricsController@edit')->name('rubric-edit');

    Route::get('questions-na/', 'Admin\QuestionsController@index')->name('questions-na');
    Route::get('rubric-questions/{id}/', 'Admin\QuestionsController@index')->name('rubric-view');
    Route::any('question/edit/{id}/', 'Admin\QuestionsController@edit')->name('question-edit');
    Route::get('question/set-status/{id}/', 'Admin\QuestionsController@status')->name('question-status');
    Route::get('question/delete/{id}/', 'Admin\QuestionsController@delete')->name('question-delete');


    Route::get('users/', 'Admin\UsersController@index')->name('users');
    Route::get('users/{group}/', 'Admin\UsersController@index')->name('users-group-list');
    Route::any('user/add/', 'Admin\UsersController@add')->name('user-add');
    Route::any('user/edit/{id}/', 'Admin\UsersController@edit')->name('user-edit');
    Route::get('user/delete/{id}/', 'Admin\UsersController@delete')->name('user-delete');
});
