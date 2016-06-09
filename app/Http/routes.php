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


Route::post('oauth/access_token', function() {
  return Response::json(Authorizer::issueAccessToken());
});


Route::group([ 'middleware' => 'oauth' ] , function() {

  Route::resource('/client', 'ClientsController', ['except' => ['create', 'edit']]);

  Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

  Route::group(['prefix' => 'project'], function () {


    Route::get('{id}/note', 'ProjectNoteController@index');
    Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
    Route::post('{id}/note', 'ProjectNoteController@store');
    Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
    Route::delete('{id}/note/{noteId}', 'ProjectNoteController@delete');

    Route::get('/tasks', 'ProjectTaskController@index');
    Route::get('/tasks/{id}', 'ProjectTaskController@show');
    Route::post('/tasks', 'ProjectTaskController@store');
    Route::put('/tasks/{id}', 'ProjectTaskController@update');
    Route::delete('/tasks/{id}', 'ProjectTaskController@destroy');

  });


  Route::post('{id}/file', 'ProjectFileController@store');

  Route::get('/project/{id}/members', 'ProjectController@members');

});











