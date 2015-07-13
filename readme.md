## Laracore Content Management System (CMS)

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laracore is a new user friendly content management system that great performance, security and flexibility, which is all provided by the latest LTS build of the Laravel framework

## Official Documentation

Documentation for the content management system will be available shortly.

## Contributing

Any developer is allowed to contribute to the application and create pull requests for new features or bugfixes.

In near future the application will offer the possibility for 3rd party modules which can be implemented.
 
Right now it is possible to develop themes for the application by creating a new folder containing the assets,
 an info-file and the necessary templates. 
 The application will automatically switch to the default template if a template is missing within the theme, as long as the coding style is kept as with the defaults.

The theme system is based on Laravel's Blade template engine and therefore all features that are available in Blade are also available to use here.

### License

The Laracore CMS is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT), as it integrates Laravel for the backend and Bootstrap for the frontend.

### Installation
The application currently requuires Composer in order to install.

Composer can be downloaded from [here](https://getcomposer.org/download/)

In order to download the dependencies with composer the PHP MCrypt extension is required on your server.

Next download the files for this application from the repository.

Install the dependencies with composer inside the webroot of the application

```
composer install
```

Be patient as the dependency installation can take some time to complete.

After installing the dependencies we need to create the file for accessing the database.

With the files a default file is provided. This file is called 
```
env.example
``` 
and in order to use it the file must be modified to contain the database credentials, your site URL, locale and timezone.

After making the changes the file must be saved as
```
.env
```
Otherwise the application will not detect your settings

If you webhost supports the configuration environment variables, the following must be defined:

```
APP_URL=http://yoursite.tld
```

```
APP_TIMEZONE=Europe/Copenhagen
```

```
APP_LOCALE=en
``

```
DB_HOST=localhost
```

```
DB_DATABASE=your_db_name_goes_here
```

```
DB_USERNAME=your_db_username_goes_here
```

```
DB_PASSWORD=your_db_password_goes_here
```

Next these commands must be executed from within the webroot

```
php artisan key:generate
``` 

```
php artisan migrate
``` 

```
php artisan db:seed
``` 

The last task is to run the command to create your initial admin user

```
php artisan laracore:create-inital-admin --username="your-username-goes-here" --password="TypeStrongPasswordHere"
```

After this you can log in to your site be using http://yoursite.tld/admin, which will redirect you to the login page.
The login page can be also be accessed from the top menu or from http://yoursite.tld/auth/login
