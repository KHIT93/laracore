<?php

Breadcrumbs::register('admin', function($breadcrumbs){
    $breadcrumbs->push('Administration', route('admin'));
});
Breadcrumbs::register('admin.dashboard', function($breadcrumbs){
    $breadcrumbs->push('Administration', route('admin'));
});

/**
 * Block Management
 */
Breadcrumbs::register('admin.blocks', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Blocks', route('admin.blocks'));
});
Breadcrumbs::register('admin.blocks.custom', function($breadcrumbs){
    $breadcrumbs->parent('admin.blocks');
    $breadcrumbs->push('Custom blocks', route('admin.blocks.custom'));
});

/**
 * Configuration Management
 */
Breadcrumbs::register('admin.config', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Configuration', route('admin.config'));
});
Breadcrumbs::register('admin.config.content', function($breadcrumbs){
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push('Content authoring', route('admin.config.content'));
});
Breadcrumbs::register('admin.config.redirects', function($breadcrumbs){
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push('URL Aliasing and redirects', route('admin.config.redirects'));
});
Breadcrumbs::register('admin.config.regional', function($breadcrumbs){
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push('Regional settings', route('admin.config.regional'));
});
Breadcrumbs::register('admin.config.regional.translate', function($breadcrumbs){
    $breadcrumbs->parent('admin.config.regional');
    $breadcrumbs->push('Translate user interface', route('admin.config.regional.translate'));
});
Breadcrumbs::register('admin.config.regional.translate.locale', function($breadcrumbs){
    $breadcrumbs->parent('admin.config.regional');
    $breadcrumbs->push('Translate user interface', route('admin.config.regional.translate.locale'));
});
Breadcrumbs::register('admin.config.textformats', function($breadcrumbs){
    $breadcrumbs->parent('admin.config');
    $breadcrumbs->push('Text formatting and filtering', route('admin.config.textformats'));
});

/**
 * Content Management
 */
Breadcrumbs::register('admin.content', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Content', route('admin.content'));
});
Breadcrumbs::register('node.add', function($breadcrumbs){
    $breadcrumbs->parent('admin.content');
    $breadcrumbs->push('Add content', route('node.add'));
});
Breadcrumbs::register('node.show', function($breadcrumbs, $node){
    $breadcrumbs->parent('front');
    $breadcrumbs->push($node->title, route('node.show', $node->nid));
});
Breadcrumbs::register('node.edit', function($breadcrumbs, $node){
    $breadcrumbs->parent('admin.content');
    $breadcrumbs->push('Edit '.$node->title, route('node.edit', $node->nid));
});
Breadcrumbs::register('node.delete', function($breadcrumbs, $node){
    $breadcrumbs->parent('admin.content');
    $breadcrumbs->push('Delete '.$node->title, route('node.delete', $node->nid));
});
Breadcrumbs::register('node.revision', function($breadcrumbs, $node, $node_revision){
    $breadcrumbs->parent('admin.content');
    $breadcrumbs->push($node->title);
    $breadcrumbs->push('Revisions', route('node.revision', [$node->nid, $node_revision->rid]));
});

/**
 * Layout Management
 */
Breadcrumbs::register('admin.layout', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Layout', route('admin.layout'));
});

/**
 * Menu Management
 */
Breadcrumbs::register('admin.menus', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Menus', route('admin.menus'));
});
Breadcrumbs::register('admin.menus.show', function($breadcrumbs, $menu){
    $breadcrumbs->parent('admin.menus');
    $breadcrumbs->push($menu->name, route('admin.menus.show', $menu->mid));
});
Breadcrumbs::register('admin.menus.links.add', function($breadcrumbs, $menu){
    $breadcrumbs->parent('admin.menus');
    $breadcrumbs->push($menu->name, route('admin.menus.links.add', $menu->mid));
});

/**
 * Module Management
 */
Breadcrumbs::register('admin.modules', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Modules', route('admin.modules'));
});
Breadcrumbs::register('admin.modules.add', function($breadcrumbs){
    $breadcrumbs->parent('admin.modules');
    $breadcrumbs->push('Add new module', route('admin.modules.add'));
});

/**
 * Theme Management
 */
Breadcrumbs::register('admin.themes', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Themes', route('admin.themes'));
});
Breadcrumbs::register('admin.modules.add', function($breadcrumbs){
    $breadcrumbs->parent('admin.themes');
    $breadcrumbs->push('Add new theme', route('admin.themes.add'));
});

/**
 * User Management
 */
Breadcrumbs::register('admin.users', function($breadcrumbs){
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Users', route('admin.users'));
});
Breadcrumbs::register('admin.users.add', function($breadcrumbs){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Add new user', route('admin.users.add'));
});
Breadcrumbs::register('admin.users.edit', function($breadcrumbs, $user){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Edit '.$user->name, route('admin.users.edit', $user->uid));
});
Breadcrumbs::register('admin.users.permissions', function($breadcrumbs){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Permissions', route('admin.users.permissions'));
});
Breadcrumbs::register('admin.users.roles', function($breadcrumbs){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Roles', route('admin.users.roles'));
});
Breadcrumbs::register('admin.users.roles.edit', function($breadcrumbs, $role){
    $breadcrumbs->parent('admin.users');
    $breadcrumbs->push('Edit '.$role->name, route('admin.users.roles.edit', $role->id));
});
Breadcrumbs::register('user.current', function($breadcrumbs, $user){
    $breadcrumbs->parent('front');
    $breadcrumbs->push('Users');
    $breadcrumbs->push($user->name, route('user.current'));
});
Breadcrumbs::register('user.show', function($breadcrumbs, $user){
    $breadcrumbs->parent('front');
    $breadcrumbs->push('Users');
    $breadcrumbs->push($user->name, route('user.show', $user->uid));
});
