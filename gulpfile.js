var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/app.css');
    mix.sass('admin.scss', 'public/css/admin.css')
    mix.sass('installer.scss', 'public/css/installer.css')
    mix.styles([
        'js/jquery.select2/select2.css',
        'js/jquery.select2/select2-bootstrap.css',
        'js/bootstrap.checkbox/bootstrap-checkbox.css'
    ], 'public/css/addons.css', 'resources/assets');
    mix.styles([
        'js/jquery.select2/select2.css',
        'js/jquery.select2/select2-bootstrap.css',
        'js/bootstrap.checkbox/bootstrap-checkbox.css'
    ], 'public/css/admin-extra.css', 'resources/assets');
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery.select2/select2.js',
        'bootstrap.checkbox/bootstrap-checkbox.js',
        'main.js'
    ], 'public/js/plugins.js', 'resources/assets/js');
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'admin/metisMenu.js',
        'admin/sb-admin-2.js',
        'jquery.select2/select2.js',
        'bootstrap-material/material.js',
        'bootstrap-material/ripples.js',
        'main.js'
    ], 'public/js/admin.plugins.js', 'resources/assets/js');
});
