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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('register', function()
{
	return View::make('register.form');
});

Route::get('register/success', function()
{
	return View::make('register.success');
});

Route::post('register', 'AuthController@postRegister');

Route::get('card/{type}', 'CardController@create');
Route::post('card/{type}', 'CardController@store');