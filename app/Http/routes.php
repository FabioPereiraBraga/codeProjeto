<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




  Route::get('/client','ClientsController@index');
  Route::get('/client/{id}','ClientsController@show');
  Route::post('/client','ClientsController@store');
  Route::put('/client/{id}','ClientsController@update');
  Route::delete('/client/{id}','ClientsController@destroy');


Route::get('/project/{id}/note','ProjectNoteController@index');
Route::get('/project/{id}/note/{noteId}','ProjectNoteController@show');
Route::post('/project/{id}/note','ProjectNoteController@store');
Route::put('/project/{id}/note/{noteId}','ProjectNoteController@update');
Route::delete('/project/{id}/note/{noteId}','ProjectNoteController@delete');


Route::get('/project/tasks','ProjectTaskController@index');
Route::get('/project/tasks/{id}','ProjectTaskController@show');
Route::post('/project/tasks','ProjectTaskController@store');
Route::put('/project/tasks/{id}','ProjectTaskController@update');
Route::delete('/project/tasks/{id}','ProjectTaskController@destroy');



Route::get('/project','ProjectController@index');
Route::get('/project/{id}','ProjectController@show');
Route::post('/project','ProjectController@store');
Route::put('/project/{id}','ProjectController@update');
Route::delete('/project/{id}','ProjectController@destroy');

Route::get('/project/{id}/members','ProjectController@members');








