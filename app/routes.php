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

Route::get('/', 'HomeController@showIndex');

Route::group(['after' => 'auth'], function() 
{
	Route::get('admin', 'AdminController@index');
});

	Route::get('create', 'TournamentController@create');
	Route::post('store', 'TournamentController@store');

	Route::get('users', 'UserController@index');
	Route::post('users/login', 'UserController@login');
	Route::post('users/register', 'UserController@register');

	Route::get('{name}', 'TournamentController@index')->where('name', '[\w]+');

	Route::post('{name}/teams/store', 'TeamController@store')->where('name', '[\w]+');
	Route::get('{name}/teams/{id}', 'TeamController@show')->where('name', '[\w]+');
	Route::get('{name}/teams/{id}/edit/', 'TeamController@edit')->where('name', '[\w]+');
	Route::post('{name}/teams/{id}/update', 'TeamController@update')->where('name', '[\w]+');
	Route::post('{name}/searching/store', 'SearcherController@store')->where('name', '[\w]+');
  Route::get('{name}/searching/{id}/destroy/{cookie}', 'SearcherController@destroy')->where('name', '[\w]+');

	Route::post('{name}/teams/store', 'TeamController@store')->where('name', '[\w]+');

	Route::get('riot.html', function()
	{
	    return '97323d7d-3768-4c79-8d9b-982278a1a4b5';
	});

	Route::get('payment/cancel', function()
	{
	    return 'A payment has not been taken as you cancelled the checkout process.';
	});

	Route::get('payment/success', function()
	{
	    return 'Payment accepted! Please send an email to jonathan4.lambert@live.uwe.ac.uk to confirm your entry.';
	});