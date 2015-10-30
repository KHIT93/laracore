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

Route::bind('path_alias', function ($value) {
    /*$alias = App\Models\PathAlias::where('alias', $value)->first();
    if($alias instanceof App\PathAlias)
    {
        return $alias;
    }
    else
    {
        throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
    }*/
    try
    {
        return App\Models\PathAlias::whereAlias($value)->firstOrFail();
    }
    catch(Illuminate\Database\Eloquent\ModelNotFoundException $ex)
    {
        throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
    }
});
Route::bind('node', function ($nid) {
    try
    {
        return App\Models\Node::findOrFail($nid);
    }
    catch (Illuminate\Database\Eloquent\ModelNotFoundException $ex)
    {
        throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
    }
});
Route::bind('menu', function ($mid) {
    return App\Models\Menu::findOrFail($mid);
});
Route::bind('menu_item', function ($id) {
    return App\Models\MenuItem::findOrFail($id);
});
Route::bind('block', function ($bid) {
    return App\Models\Block::findorFail($bid);
});
Route::bind('user', function ($uid) {
    try
    {
        return App\Models\User::findOrFail($uid);
    }
    catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex)
    {
        throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
    }
});
Route::bind('role', function ($rid) {
    return App\Models\Role::findOrFail($rid);
});
Route::bind('translation', function($id){
    return App\Models\Translation::findOrFail($id);
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

Route::get('update', 'UpdateController@index');

Route::get('update/tasks', 'UpdateController@tasks');

Route::post('update', 'UpdateController@run');

Route::get('update/finish', 'UpdateController@finish');
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
Route::get('admin/themes', 'ThemeController@index');

Route::get('admin/themes/{theme}', 'ThemeController@apply');

/**
 * Routing for Module Management.
 */
Route::get('admin/modules', 'ModulesController@index');

Route::get('admin/modules/{slug}/enable', 'ModulesController@enable');

Route::get('admin/modules/{slug}/disable', 'ModulesController@disable');

Route::post('admin/modules/{slug}/disable', 'ModulesController@postDisable');

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
 * Routing for Permission Management.
 */
Route::get('admin/users/permissions', 'PermissionController@index');

Route::post('admin/users/permissions', 'PermissionController@update');

/**
 * Routing for Configuration Management.
 */
Route::get('admin/config', 'ConfigurationController@index');

Route::get('admin/config/text-formats', 'ConfigurationController@textFormats');

/**
 * Routing for Redirect/PathAlias management
 */
Route::get('admin/config/redirect', 'RedirectController@index');

Route::post('admin/config/redirect/add', 'RedirectController@store');

/**
 * Routing for regional settings and translations
 */
Route::get('admin/config/regional', 'RegionalController@index');

Route::post('admin/config/regional', 'RegionalController@update');

Route::get('admin/config/regional/translate', 'RegionalController@translateList');

Route::get('admin/config/regional/{locale}/translate', 'RegionalController@translateList');

Route::get('admin/config/regional/translate/{translation}', 'RegionalController@translate');

Route::post('admin/config/regional/translate/{translation}', 'RegionalController@updateTranslation');

/**
 * Default controller routes from Laravel.
 */
Route::controllers([
    'auth'                  => 'Auth\AuthController',
    'password'              => 'Auth\PasswordController',
    'admin/config/system'   => 'ConfigurationController',
    'admin/reports'         => 'ReportController'
]);

/**
 * Routing for application installer
 */
Route::get('installer', 'InstallController@welcome');
Route::post('installer', 'InstallController@postWelcome');
Route::get('installer/license', 'InstallController@license');
Route::post('installer/license', 'InstallController@postLicense');
Route::get('installer/requirements', 'InstallController@requirements');
Route::post('installer/requirements', 'InstallController@postRequirements');
Route::get('installer/database', 'InstallController@database');
Route::post('installer/database', 'InstallController@postDatabase');
Route::post('installer/dbcheck', 'InstallController@dbcheck');
Route::get('installer/site', 'InstallController@site');
Route::post('installer/site', 'InstallController@postSite');
Route::get('installer/run', 'InstallController@run');
Route::post('installer/run', 'InstallController@postRun');
Route::get('installer/finish', 'InstallController@finish');
Route::get('installer/fail', 'InstallController@fail');
/*
 * Default route for using path aliases instead of node/{nid}.
 */
//Route::get('{path_alias}', 'NodeController@resolve');
Route::get('{path_alias}', 'RedirectController@resolve');
