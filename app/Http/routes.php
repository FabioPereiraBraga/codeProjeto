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