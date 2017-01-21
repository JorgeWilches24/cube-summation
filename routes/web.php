<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'CubeController@index');
Route::get('/indexPartial', 'CubeController@indexPartial');
Route::post('/create', 'CubeController@create');
Route::post('/createCube', 'CubeController@createCube');
Route::post('/update', 'CubeController@update');
Route::post('/query', 'CubeController@query');
