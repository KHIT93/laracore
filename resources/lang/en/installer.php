<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */
    'app' => [
        'slogan' => 'CMS for the future'
    ],
    'welcome' => [
        'header' => 'Welcome',
        'intro'     => 'You are about to install Laracore onto this website',
        'choose_lang' => 'Choose language',
        'lang_note' => "Please choose the language you wish to use for your website.<br>Note that not all languages are fully translated from the beginning,<br>but 3rd party developers might provide the missing translations."
    ],
    'license' => [
        'header' => 'License agreement',
        'note' => "Laracore is built using open-source technology and open-source programming libraries. These are licensed on the MIT license.<br>These libraries include, but are not limited to, Bootstrap, Laravel and jQuery",
        'accept' => 'I accept the license terms'
    ],
    'requirements' => [
        'header' => 'Application requirements',
        'info' => "Your webhost does not meet the requirements for running Laracore.<br>Please review and fix any issues listed below before you continue",
        'match' => [
            'php_version_match' => 'Your PHP version is compatible with Laracore.',
            'openssl' => 'The OpenSSL extension for PHP is enabled',
            'mcrypt' => 'The Mcrypt extension for PHP is enabled',
            'pdo' => 'The PDO database library extension is enabled',
            'mbstring' => 'The Mbstring extension for PHP is enabled',
            'tokenizer' => 'The Tokenizer extension for PHP is enabled',
            'storageperm' => 'The path :path is writable'
        ],
        'mismatch' => [
            'php_version_match' => 'Your PHP version is not compatible with Laracore. You need at least PHP :version',
            'openssl' => 'The OpenSSL extension for PHP is not enabled. Please enable the extension and try again',
            'mcrypt' => 'The Mcrypt extension for PHP is not enabled. Please enable the extension and try again',
            'pdo' => 'The PDO database library extension is not enabled. Please enable the extension and try again',
            'mbstring' => 'The Mbstring extension for PHP is not enabled. Please enable the extension and try again',
            'tokenizer' => 'The Tokenizer extension for PHP is not enabled. Please enable the extension and try again',
            'storageperm' => 'The path :path is not writable. Please fix the permissions so that the owner and owner group has read + write + execute and others have read + execute (0775)'
        ]
    ],
    'check_again' => 'Check again',
    'database' => [
        'header' => 'Set up database',
        'intro' => 'Please choose the type of database that you will be using for this website',
        'mysql' => 'MySQL or MariaDB',
        'sqlsrv' => 'Microsoft SQL Server',
        'sqlite' => 'SQLite',
        'db_database' => 'Database name',
        'db_username' => 'Database username',
        'db_password' => 'Database password',
        'adv_notes' => 'These fields are not required to perform the installation on MySQL, however it is needed if you are running Microsoft SQL Server',
        'db_prefix' => 'Table prefix',
        'test' => 'Test connection'
    ],
    'adv_settings' => 'Advanced settings',
    'hostname' => 'Hostname',
    'port' => 'Portnumber',
    'site' => [
        'header' => 'Configure your site',
        'intro' => 'Please fill in the fields below with the proper information',
        'info' => 'Site information',
        'name' => 'Site name',
        'email' => 'Site email',
        'email_note' => 'This email address will be used as the From-address for any email sent from the website, unless a module overrides this in its own configuration',
        'admin' => [
            'header' => 'Administrator account',
            'email' => 'Administrator email',
            'name' => 'Administrator name',
            'password' => 'Administrator password',
            'password_again' => 'Confirm administrator password'
        ],
        'email_cfg' => [
            'driver' => 'Select how you want to send mail',
            'encryption' => 'Select the encryption protocol used by mail server'
        ],
        'timezone' => 'Select timezone',
        'country' => 'Choose your country'
    ],
    'username' => 'Username',
    'password' => 'Password',
    'regional' => [
        'header' => 'Regional settings'
    ],
    'install' => 'Install',
    'done' => 'Done',
    'installing' => 'Installing',
    'complete' => 'Complete',
    'finish' => [
        'header' => 'Congratulations',
        'info' => "Your new site is now installed.<br>You can either go directly to the site and see what your visitors see<br>or go to the backend and start creating content and customize your website"
    ],
    'failed' => [
        'header' => 'Installation failed',
        'info' => "The installation and configuration of Laracore has failed.<br>A summary of the errors are below. Otherwise see the log file for details.",
        'env' => 'Could not set up the environment',
        'migration' => 'An error occurred during the installation of the application database. Please see '.storage_path('logs').' for details',
        'seeding' => 'An error occurred during the configuration of the application database. Please see '.storage_path('logs').' for details',
        'app_key' => 'Could not update the application key',
        'admin' => 'Could not create the administrator account'
    ],
    'php_version' => 'PHP Version',
    'admin' => 'Start customizing',
    'frontend' => 'Visit your site'
];
