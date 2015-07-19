<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Folders Permissions
    |--------------------------------------------------------------------------
    |
    | These are the default Laracore folders permissions, that are required
    | for the application to work properly
    |
    */

    'permissions' => [
        'storage/app/'          => 775,
        'storage/framework/'    => 777,
        'storage/logs/'         => 777,
        'bootstrap/cache/'      => 775,
        'public/themes/'        => 775
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    |
    | This is the default Laracore server requirements, we check if the extension
    | is enabled by looping through the array and run "extension_loaded" on it.
    |
    */
    'extensions' => [
        'openssl',
        'mcrypt',
        'pdo',
        'mbstring',
        'tokenizer'
    ],
    'php_version' => '5.5.9'
];