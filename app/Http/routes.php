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

/**
 * Create Route-Model Bindingd
 */

Route::bind('path_alias', function($value)
{
    return App\PathAlias::where('alias', $value)->first();
});
Route::bind('node', function($nid){
    return App\Node::findOrFail($nid);
});

/**
 * Create generic routes
 */
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
/**
 * Routing for nodes
 */
Route::get('admin/content', 'NodeController@index');

Route::get('node/add', 'NodeController@create');

Route::post('node/add', 'NodeController@store');

Route::get('node/{node}', 'NodeController@show');

Route::get('node/{node}/edit', 'NodeController@edit');

Route::post('node/{node}/edit', 'NodeController@update');

Route::get('node/{node}/delete', 'NodeController@remove');

Route::post('node/{node}/delete', 'NodeController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('{path_alias}', 'NodeController@resolve');
