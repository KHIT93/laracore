<?php
/**
 * Create Route-Model Bindings.
 */

Route::bind('path_alias', function ($value) {
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
Route::bind('node_revision', function ($rid) {
    try
    {
        return App\Models\NodeRevision::findOrFail($rid);
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

Route::bind('textfilter', function ($filter_id) {
    try
    {
        return App\Models\TextFilter::findOrFail($filter_id);
    }
    catch (Illuminate\Database\Eloquent\ModelNotFoundException $ex)
    {
        throw new \Symfony\Component\HttpKernel\Exception\HttpException(404);
    }
});

/**
 *  Generic routes.
 */
Route::get('/', ['as' => 'front', 'uses' => 'NodeController@showDefault']);

Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminController@index']);

Route::get('admin/layout', ['as' => 'admin.layout', 'uses' => 'LayoutController@index']);

Route::get('admin/users', ['as' => 'admin.users', 'uses' => 'UserController@index']);

Route::get('user', ['as' => 'user.current', 'uses' => 'UserController@showCurrent']);

Route::get('user/{user}', ['as' => 'user.show', 'uses' => 'UserController@show']);

Route::get('update', ['as' => 'laracore.update', 'uses' => 'UpdateController@index']);

Route::get('update/tasks', ['as' => 'laracore.update.tasks', 'uses' => 'UpdateController@tasks']);

Route::post('update', 'UpdateController@run');

Route::get('update/finish', ['as' => 'laracore.update.finish', 'uses' => 'UpdateController@finish']);
/**
 * Routing for nodes.
 */
Route::get('admin/content', ['as' => 'admin.content', 'uses' => 'NodeController@index']);

Route::get('node/add', ['as' => 'node.add', 'uses' => 'NodeController@create']);

Route::post('node/add', 'NodeController@store');

Route::get('node/{node}', ['as' => 'node.show', 'uses' => 'NodeController@show']);

Route::get('node/{node}/edit', ['as' => 'node.edit', 'uses' => 'NodeController@edit']);

Route::post('node/{node}/edit', 'NodeController@update');

Route::get('node/{node}/delete', ['as' => 'node.delete', 'uses' => 'NodeController@remove']);

Route::post('node/{node}/delete', 'NodeController@destroy');

Route::get('node/{node}/revision/{node_revision}', ['as' => 'node.revision', 'uses' => 'NodeController@revision']);

Route::post('node/{node}/revision/{node_revision}/delete', 'NodeController@destroyRevision');

/**
 * Routing for Menu management.
 */
Route::get('admin/menus', ['as' => 'admin.menus', 'uses' => 'MenuController@index']);

Route::get('admin/menus/add', ['as' => 'admin.menus.add', 'uses' => 'MenuController@create']);

Route::post('admin/menus/add', 'MenuController@store');

Route::get('admin/menus/{menu}/edit', ['as' => 'admin.menus.edit', 'uses' => 'MenuController@edit']);

Route::post('admin/menus/{menu}/edit', 'MenuController@update');

Route::get('admin/menus/{menu}/delete', ['as' => 'admin.menus.delete', 'uses' => 'MenuController@remove']);

Route::post('admin/menus/{menu}/delete', 'MenuController@destroy');

Route::get('admin/menus/{menu}/links', ['as' => 'admin.menus.show', 'uses' => 'MenuController@show']);

Route::post('admin/menus/{menu}/links', 'MenuItemController@updatePositions');

Route::get('admin/menus/{menu}/links/add', ['as' => 'admin.menus.links.add', 'uses' => 'MenuItemController@create']);

Route::post('admin/menus/{menu}/links/add', 'MenuItemController@store');

Route::get('admin/menus/{menu}/{menu_item}/edit', ['as' => 'admin.menus.links.edit', 'uses' => 'MenuItemController@edit']);

Route::post('admin/menus/{menu}/{menu_item}/edit', 'MenuItemController@update');

Route::get('admin/menus/{menu}/{menu_item}/delete', ['as' => 'admin.menus.links.delete', 'uses' => 'MenuItemController@remove']);

Route::post('admin/menus/{menu}/{menu_item}/delete', 'MenuItemController@destroy');

/**
 * Routing for Block Management.
 */
Route::get('admin/blocks', ['as' => 'admin.blocks', 'uses' => 'BlockController@index']);

Route::get('admin/blocks/custom', ['as' => 'admin.blocks.custom', 'uses' => 'BlockController@indexCustom']);

Route::post('admin/blocks', 'BlockController@updatePositions');

Route::get('admin/blocks/add', ['as' => 'admin.blocks.add', 'uses' => 'BlockController@create']);

Route::post('admin/blocks/add', 'BlockController@store');

Route::get('admin/blocks/{block}/edit', ['as' => 'admin.blocks.edit', 'uses' => 'BlockController@edit']);

Route::post('admin/blocks/{block}/edit', 'BlockController@update');

Route::get('admin/blocks/{block}/delete', ['as' => 'admin.blocks.delete', 'uses' => 'BlockController@remove']);

Route::post('admin/blocks/{block}/delete', 'BlockController@destroy');

/**
 * Routing for Theme Management.
 */
Route::get('admin/themes', ['as' => 'admin.themes', 'uses' => 'ThemeController@index']);

Route::get('admin/themes/add', ['as' => 'admin.themes.add', 'uses' => 'ThemeController@add']);

Route::post('admin/themes/add', 'ThemeController@install');

Route::post('admin/themes/{theme}', 'ThemeController@apply');
/**
 * Routing for Module Management.
 */
Route::get('admin/modules', ['as' => 'admin.modules', 'uses' => 'ModulesController@index']);

Route::post('admin/modules', 'ModulesController@bulkChange');

Route::get('admin/modules/add', ['as' => 'admin.modules.add', 'uses' => 'ModulesController@add']);

Route::post('admin/modules/add', 'ModulesController@install');

Route::post('admin/modules/{slug}/enable', 'ModulesController@enable');

Route::get('admin/modules/{slug}/disable', 'ModulesController@disable');

Route::post('admin/modules/{slug}/disable', 'ModulesController@postDisable');

/**
 * Routing for User Management.
 */
Route::get('admin/users/add', ['as' => 'admin.users.add', 'uses' => 'UserController@create']);

Route::post('admin/users/add', 'UserController@store');

Route::get('admin/users/{user}/edit', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit']);

Route::post('admin/users/{user}/edit', 'UserController@update');

Route::get('admin/users/{user}/delete', ['as' => 'admin.users.delete', 'uses' => 'UserController@remove']);

Route::post('admin/users/{user}/delete', 'UserController@destroy');

/**
 * Routing for Role Management.
 */
Route::get('admin/users/roles', ['as' => 'admin.users.roles', 'uses' => 'RoleController@index']);

Route::post('admin/users/roles', 'RoleController@store');

Route::get('admin/users/roles/{role}/edit', ['as' => 'admin.users.roles.edit', 'uses' => 'RoleController@edit']);

Route::post('admin/users/roles/{role}/edit', 'RoleController@update');

Route::get('admin/users/roles/{role}/delete', ['as' => 'admin.users.roles.delete', 'uses' => 'RoleController@remove']);

Route::post('admin/users/roles/{role}/delete', 'RoleController@destroy');

/**
 * Routing for Permission Management.
 */
Route::get('admin/users/permissions', ['as' => 'admin.users.permissions', 'uses' => 'PermissionController@index']);

Route::post('admin/users/permissions', 'PermissionController@update');

/**
 * Routing for Configuration Management.
 */
Route::get('admin/config', ['as' => 'admin.config', 'uses' => 'ConfigurationController@index']);

Route::get('admin/config/text-formats', ['as' => 'admin.config.textformats', 'uses' => 'ConfigurationController@textFormats']);

Route::get('admin/config/text-formats/{textfilter}', ['as' => 'admin.config.textformats.edit', 'uses' => 'ConfigurationController@editTextFormat']);

Route::post('admin/config/text-formats/{textfilter}', 'ConfigurationController@updateTextFormat');

Route::get('admin/config/text-formats/{textfilter}/delete', ['as' => 'admin.config.textformats.delete', 'uses' => 'ConfigurationController@deleteTextFormat']);

Route::post('admin/config/text-formats/{textfilter}/delete', 'ConfigurationController@destroyTextFormat');

Route::get('admin/config/content', ['as' => 'admin.config.content', 'uses' => 'ConfigurationController@content']);

Route::post('admin/config/content', 'ConfigurationController@postContent');

/**
 * Routing for Redirect/PathAlias management
 */
Route::get('admin/config/redirect', ['as' => 'admin.config.redirects', 'uses' => 'RedirectController@index']);

Route::post('admin/config/redirect/add', 'RedirectController@store');

/**
 * Routing for regional settings and translations
 */
Route::get('admin/config/regional', ['as' => 'admin.config.regional', 'uses' => 'RegionalController@index']);

Route::post('admin/config/regional', 'RegionalController@update');

Route::get('admin/config/regional/translate', ['as' => 'admin.config.regional.translate', 'uses' => 'RegionalController@translateList']);

Route::get('admin/config/regional/{locale}/translate', ['as' => 'admin.config.regional.translate.locale', 'uses' => 'RegionalController@translateList']);

Route::get('admin/config/regional/translate/{translation}', ['as' => 'admin.config.regional.translate.form', 'uses' => 'RegionalController@translate']);

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
Route::get('installer', ['as' => 'install.index', 'uses' => 'InstallController@welcome']);

Route::post('installer', 'InstallController@postWelcome');

Route::get('installer/license', ['as' => 'install.license', 'uses' => 'InstallController@license']);

Route::post('installer/license', 'InstallController@postLicense');

Route::get('installer/requirements', ['as' => 'install.requirements', 'uses' => 'InstallController@requirements']);

Route::post('installer/requirements', 'InstallController@postRequirements');

Route::get('installer/database', ['as' => 'install.database', 'uses' => 'InstallController@database']);

Route::post('installer/database', 'InstallController@postDatabase');

Route::post('installer/dbcheck', 'InstallController@dbcheck');

Route::get('installer/site', ['as' => 'install.site', 'uses' => 'InstallController@site']);

Route::post('installer/site', 'InstallController@postSite');

Route::get('installer/run', ['as' => 'install.run', 'uses' => 'InstallController@run']);

Route::post('installer/run', 'InstallController@postRun');

Route::get('installer/finish', ['as' => 'install.finish', 'uses' => 'InstallController@finish']);

Route::get('installer/fail', ['as' => 'install.fail', 'uses' => 'InstallController@fail']);

/**
 * Routing for debugging
 */
Route::group(['middleware' => 'debugmode', 'prefix' => 'debug'], function(){
    Route::controllers([
        'variables' => 'Debugging\VariablesController'
    ]);
});
/*
 * Default route for using path aliases instead of node/{nid}.
 */
//Route::get('{path_alias}', 'NodeController@resolve');
Route::get('{path_alias}', 'RedirectController@resolve');
