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

// This were commented because now the Confide routes are used.
//Route::resource('users', 'UsersController');
Route::resource('register', 'UsersController@create');

Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('users/loginWithFacebook', 'UsersController@loginWithFacebook');
route::get('test', 'UsersController@test');
route::get('test2', 'UsersController@test2');

Route::resource('claims', 'ClaimsController');

Route::resource('publicWorks', 'PublicWorksController');

Route::resource('informationRequests', 'InformationRequestsController');
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
