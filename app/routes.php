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
Route::get('/about_us', function () { return View::make('about_us'); });
Route::get('/presentation', function () { return View::make('presentation'); });

Route::get('register', 'UsersController@create');
Route::get('users/admin', 'UsersController@admin');
Route::get('users/show/{username}', 'UsersController@show');
Route::get('users/edit/{username}', 'UsersController@edit');
Route::post('users/update', array('as' => 'users.update', 'uses' => 'UsersController@update'));
Route::post('users/delete', array('as' => 'users.delete', 'uses' => 'UsersController@delete'));

Route::get('users/loginWithFacebook', 'UsersController@loginWithFacebook');
Route::get('users/loginWithTwitter', 'UsersController@loginWithTwitter');
Route::get('users/loginWithGoogle', 'UsersController@loginWithGoogle');
route::get('test', 'UsersController@test');
route::get('test2', 'UsersController@test2');

Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

Route::get('claims/get_report', array('as' => 'claims.get_report', 'uses' => 'ClaimsController@get_report'));
Route::get('claims/export', array('as' => 'claims.export', 'uses' => 'ClaimsController@export'));
Route::resource('claims', 'ClaimsController');

Route::resource('publicWorks', 'PublicWorksController');

Route::resource('informationRequests', 'InformationRequestsController');

Route::resource('supportToClaim', 'SupportToClaimController');

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

// Internet.org routes :/
Route::get('fbo/', function() { return View::make('fbo.home'); });
