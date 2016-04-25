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

Route::get('/', function () {
    return view('welcome');
});


  Route::get('/clients','ClientsController@index');

  Route::get('/clients/find/{id}','ClientsController@show');

  Route::post('/clients','ClientsController@store');

  Route::post('/clients/{id}','ClientsController@update');

  Route::delete('/clients/{id}','ClientsController@destroy');