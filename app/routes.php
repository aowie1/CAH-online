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

// Common Routes
Route::get('/', function()
{
	return View::make('register.form');
});

// Auth Routes
Route::get('register', 'AuthController@getRegister');
Route::get('register/success', function() {	return View::make('register.success'); });
Route::post('register', 'AuthController@postRegister');

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');

Route::get('forgot', 'AuthController@getForgotPW');

// Card Routes
Route::get('card/{type}', 'CardController@getCreate');
Route::post('card/{type}', array('before' => 'csrf', 'uses' => 'CardController@postStore'));
