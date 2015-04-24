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
 * Create Route-Model Bindings.
 */

Route::bind('path_alias', function($value)
{
    return App\PathAlias::where('alias', $value)->first();
});
Route::bind('node', function($nid){
    return App\Node::findOrFail($nid);
});
Route::bind('menu', function($mid){
    return App\Menu::findOrFail($mid);
});
Route::bind('menu_item', function($id){
    return App\MenuItem::findOrFail($id);
});
Route::bind('block', function($bid){
    return App\Block::findorFail($bid);
});
Route::bind('user', function($uid){
    return App\User::findOrFail($uid);
});
Route::bind('role', function($rid){
    return App\Role::findOrFail($rid);
});

/**
 *  Generic routes.
 */
Route::get('/', 'NodeController@showDefault');

Route::get('admin', 'AdminController@index');

Route::get('admin/dashboard', 'AdminController@index');

Route::get('admin/layout', 'LayoutController@index');

Route::get('admin/users', 'UserController@index');

Route::get('user', 'UserController@showCurrent');

Route::get('user/{user}', 'UserController@show');
/**
 * Routing for nodes.
 */
Route::get('admin/content', 'NodeController@index');

Route::get('node/add', 'NodeController@create');

Route::post('node/add', 'NodeController@store');

Route::get('node/{node}', 'NodeController@show');

Route::get('node/{node}/edit', 'NodeController@edit');

Route::post('node/{node}/edit', 'NodeController@update');

Route::get('node/{node}/delete', 'NodeController@remove');

Route::post('node/{node}/delete', 'NodeController@destroy');

/**
 * Routing for Menu management.
 */
Route::get('admin/menus', 'MenuController@index');

Route::get('admin/menus/add', 'MenuController@create');

Route::post('admin/menus/add', 'MenuController@store');

Route::get('admin/menus/{menu}/edit', 'MenuController@edit');

Route::post('admin/menus/{menu}/edit', 'MenuController@update');

Route::get('admin/menus/{menu}/delete', 'MenuController@remove');

Route::post('admin/menus/{menu}/delete', 'MenuController@destroy');

Route::get('admin/menus/{menu}/links', 'MenuController@show');

Route::get('admin/menus/{menu}/links/add', 'MenuItemController@create');

Route::post('admin/menus/{menu}/links/add', 'MenuItemController@store');

Route::get('admin/menus/{menu}/{menu_item}/edit', 'MenuItemController@edit');

Route::post('admin/menus/{menu}/{menu_item}/edit', 'MenuItemController@update');

Route::get('admin/menus/{menu}/{menu_item}/delete', 'MenuItemController@remove');

Route::post('admin/menus/{menu}/{menu_item}/delete', 'MenuItemController@destroy');

/**
 * Routing for Block Management.
 */
Route::get('admin/blocks', 'BlockController@index');

Route::get('admin/blocks/add', 'BlockController@create');

Route::post('admin/blocks/add', 'BlockController@store');

Route::get('admin/blocks/{block}/edit', 'BlockController@edit');

Route::post('admin/blocks/{block}/edit', 'BlockController@update');

Route::get('admin/blocks/{block}/delete', 'BlockController@remove');

Route::post('admin/blocks/{block}/delete', 'BlockController@destroy');

/**
 * Routing for Theme Management.
 */

/**
 * Routing for Module Management.
 */

/**
 * Routing for User Management.
 */
Route::get('admin/users/add', 'UserController@create');

Route::post('admin/users/add', 'UserController@store');

Route::get('admin/users/{user}/edit', 'UserController@edit');

Route::post('admin/users/{user}/edit', 'UserController@update');

Route::get('admin/users/{user}/delete', 'UserController@remove');

Route::post('admin/users/{user}/delete', 'UserController@destroy');

/**
 * Routing for Role Management.
 */
Route::get('admin/users/roles', 'RoleController@index');

Route::post('admin/users/roles', 'RoleController@store');

Route::get('admin/users/roles/{role}/edit', 'RoleController@edit');

Route::post('admin/users/roles/{role}/edit', 'RoleController@update');

Route::get('admin/users/roles/{role}/delete', 'RoleController@remove');

Route::post('admin/users/roles/{role}/delete', 'RoleController@destroy');

/**
 * Default controller routes from Laravel.
 */
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
 * Default route for using path aliases instead of node/{nid}.
 */
Route::get('{path_alias}', 'NodeController@resolve');
