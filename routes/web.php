<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Assessment*/
Route::resource('assessments', 'AssessmentController');

/*Tasks*/
Route::resource('tasks', 'TaskController');

/* Users */
Route::resource('users', 'UserController');
Route::get('myprofile', 'UserController@myProfile')->name('myprofile');

/* Projects */
Route::resource('projects', 'ProjectController');

/* Trello */
Route::resource('trello', 'TrelloController');

/*GitHub*/
Route::resource('github', 'GitHubController');
