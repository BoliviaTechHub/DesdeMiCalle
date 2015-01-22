<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {	return View::make('home'); });

Route::resource('users', 'UsersController');
Route::resource('register', 'UsersController@create');

Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::resource('claims', 'ClaimsController');

Route::resource('publicWorks', 'PublicWorksController');

Route::resource('informationRequests', 'InformationRequestsController');