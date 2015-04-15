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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
/**
 * Routing for nodes
 */
Route::get('admin/content', 'NodeController@index');

Route::get('node/add', 'NodeController@create');

Route::get('node/{nid}', 'NodeController@show');

Route::get('node/{nid}/edit', 'NodeController@edit');

Route::get('node/{nid}/delete', 'NodeController@remove');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
