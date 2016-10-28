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


Route::get('/',function(){
  return view('app');
});
Route::post('oauth/access_token', function() {
  return Response::json(Authorizer::issueAccessToken());
});


Route::group([ 'middleware' => 'oauth' ] , function() {

  Route::resource('/client', 'ClientsController', ['except' => ['create', 'edit']]);

  Route::resource('/project', 'ProjectController', ['except' => ['create', 'edit']]);

  Route::group(['middleware'=>'check.project.permission','prefix' => 'project'], function () {
    
    Route::get('{id}/note', 'ProjectNoteController@index');
    Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
    Route::post('{id}/note', 'ProjectNoteController@store');
    Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
    Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');

    Route::get('{id}/tasks', 'ProjectTaskController@index');
    Route::get('{id}/tasks/{idTask}', 'ProjectTaskController@show');
    Route::post('{id}/tasks', 'ProjectTaskController@store');
    Route::put('{id}/tasks/{idTask}', 'ProjectTaskController@update');
    Route::delete('{id}/tasks/{idTask}', 'ProjectTaskController@destroy');

    Route::get('{id}/members', 'ProjectMemberController@index');
    Route::get('{id}/members/{idMember}', 'ProjectMemberController@show');
    Route::post('{id}/members', 'ProjectMemberController@store');
    Route::put('{id}/members/{idMember}', 'ProjectMemberController@update');
    Route::delete('{id}/members/{idMember}', 'ProjectMemberController@destroy');

    Route::get('{id}/file', 'ProjectFileController@index');
    Route::get('{id}/file/{fileId}', 'ProjectFileController@show');
    Route::get('{id}/file/{fileId}/download', 'ProjectFileController@showFile');
    Route::post('{id}/file', 'ProjectFileController@store');
    Route::put('{id}/file/{fileId}', 'ProjectFileController@update');
    Route::delete('{id}/file/{fileId}', 'ProjectFileController@destroy');

  });





  Route::get('/user/authenticated', 'UserController@authenticated');

});











