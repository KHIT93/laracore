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
    mix.less('app.less', 'resources/assets/css');
    mix.styles([
        'css/app.css',
        'css/font-awesome.min.css',
        'css/admin/sidebar.css',
        'js/jquery.select2/select2.min.css'
    ], 'public/css/styles.css', 'resources/assets');
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery.select2/select2.min.js',
        'main.js'
    ], 'public/js/plugins.js', 'resources/assets/js');
});
