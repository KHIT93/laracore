<?php

namespace App\Http\Controllers;

use App\Libraries\Installer;
use App\Libraries\RequirementsChecker;
use App\Libraries\StoragePermissionChecker;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\DatabaseCredentialsRequest;
use App\Http\Requests\AcceptLicenseRequest;
use App\Http\Requests\SiteInformationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Artisan;
use Laracasts\Flash\Flash;

class InstallController extends Controller
{
    public function __construct()
    {
        //Run middleware to check if the installer has been run before
        $this->middleware('installed', ['except' => ['finish', 'fail']]);
    }

    public function welcome()
    {
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer',
            'screen' => 'installer.welcome'
        ]);
    }

    public function postWelcome(Request $request)
    {
        $request->session()->put(['APP_LOCALE' => $request->input('langcode')]);
        return redirect('installer/license');
    }

    public function license(Request $request)
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        $request->session()->put(['APP_LOCALE' => $request->input('langcode')]);
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/license',
            'screen' => 'installer.license'
        ]);
    }

    public function postLicense(AcceptLicenseRequest $request)
    {
        return redirect('installer/requirements');
    }

    public function requirements()
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        //Check if the requirements are passed, otherwise display requirements page
        $validation = true;
        $validator = $this->checkRequirementsAndStoragePermisions();
        foreach ($validator['requirements'] as $validated)
        {
            if(!$validated)
            {
                $validation = false;
            }
        }
        foreach ($validator['storageperms'] as $validated)
        {
            if(!$validated)
            {
                $validation = false;
            }
        }
        if(!$validator['php_version'])
        {
            $validation = false;
        }

        /*return ($validation === true) ? redirect('installer/database') : view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/requirements',
            'screen' => 'installer.requirements',
            'requirements' => $validator['requirements'],
            'storageperms' => $validator['storageperms'],
            'php_version' => $validator['php_version']
        ]);*/
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/requirements',
            'screen' => 'installer.requirements',
            'requirements' => $validator['requirements'],
            'storageperms' => $validator['storageperms'],
            'php_version' => $validator['php_version']
        ]);
    }

    private function checkRequirementsAndStoragePermisions()
    {
        $requirements = new RequirementsChecker();
        $storageperms = new StoragePermissionChecker();
        return [
            'php_version' => version_compare(PHP_VERSION, config('requirements.php_version'), '>='),
            'requirements' => $requirements->check(config('requirements.extensions'))['requirements'],
            'storageperms' => $storageperms->check(config('requirements.permissions'))['permissions']
        ];
    }

    private function validateRequirements()
    {
        //Validate the requirements for the application and return either true or an error/warning list
        $requirements = [
            'php_version' => '5.5.9',
            'php_version_match' => true,
            'openssl' => true,
            'mcrypt' => true,
            'pdo' => true,
            'mbstring' => true,
            'tokenizer' => true
        ];
        $checklist = [
            'php_version_match' => version_compare(PHP_VERSION, $requirements['php_version'], '>='),
            'openssl' => extension_loaded('openssl'),
            'mcrypt' => extension_loaded('mcrypt'),
            'pdo' => extension_loaded('pdo'),
            'mbstring' => extension_loaded('mbstring'),
            'tokenizer' => extension_loaded('tokenizer')
        ];
        $errors = [];
        $success = [];
        foreach($checklist as $key => $value)
        {
            if($checklist[$key] != $requirements[$key])
            {
                if($key == 'php_version_match')
                {
                    $errors[] = trans('installer.requirements.mismatch.'.$key, ['version' => PHP_VERSION]);
                }
                else
                {
                    $errors[] = trans('installer.requirements.mismatch.'.$key);
                }
            }
            else
            {
                $success[] = trans('installer.requirements.match.'.$key);
            }
        }
        return (count($errors)) ? ['success' => $success, 'errors' => $errors] : true;
    }

    public function postRequirements(Request $request)
    {
        $validation = $this->validateRequirements();
        return ($validation === true) ? redirect('installer/database') : $this->requirements();
    }

    public function database($error = null)
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/database',
            'screen' => 'installer.database',
            'error' => $error
        ]);
    }

    public function postDatabase(DatabaseCredentialsRequest $request)
    {
        //Save information in temp storeage for later generation of the environment variables

        if($request->input('DB_DRIVER') == 'sqlite')
        {
            $request->session()->put(['DB_DRIVER' => 'sqlite']);
        }
        else
        {
            foreach ($request->all() as $key => $value)
            {
                $request->session()->put([$key => $value]);
            }
        }
        $dbcheck = $this->dbcheck();
        if($dbcheck === true)
        {
            return redirect('installer/site');
        }
        else
        {
            return $this->database($dbcheck);
        }
    }

    public function dbcheck()
    {
        try
        {
            $capsule = new Capsule();
            $capsule->addConnection([
                'driver' => session('DB_DRIVER'),
                'host' => session('DB_HOST'),
                'database' => session('DB_DATABASE'),
                'username' => session('DB_USERNAME'),
                'password' => session('DB_PASSWORD'),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => session('DB_PREFIX')
            ]);
            $capsule->setAsGlobal();
            $capsule->getDatabaseManager()->connection()->getDatabaseName();
            return true;
        }
        catch(\PDOException $ex)
        {
            return $ex->getMessage();
        }
    }

    public function site()
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/site',
            'screen' => 'installer.site'
        ]);
    }

    public function postSite(SiteInformationRequest $request)
    {
        //Save information in temp storeage for later generation of the environment variables
        foreach ($request->all() as $key => $value) {
            $request->session()->put([$key =>  $value]);
        }
        $install = new Installer();
        //Generate environment variables and save them
        if(!$install->environment())
        {
            Flash::error(trans('installer.failed.env'));
            return redirect('installer/fail');
        }
        return redirect('installer/run');
    }

    public function run()
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/run',
            'screen' => 'installer.install'
        ]);
    }

    public function postRun(Request $request)
    {
        //run the installations process
        try
        {
            \Artisan::call('migrate');
        }
        catch(Exception $ex)
        {
            Flash::error(trans('installer.failed.migration'))->important();
            return redirect('installer/fail');
        }
        try
        {
            \Artisan::call('db:seed');
        }
        catch(Exception $ex)
        {
            Flash::error(trans('installer.failed.seeding'))->important();
            return redirect('installer/fail');
        }
        $install = new Installer();
        //Generate environment variables and save them
        if(!$install->environment(true))
        {
            Flash::error(trans('installer.failed.env'))->important();
            return redirect('installer/fail');
        }
        try
        {
            \Artisan::call('key:generate');
        }
        catch(Exception $ex)
        {
            Flash::error(trans('installer.failed.app_key'))->important();
            return redirect('installer/fail');
        }
        $admin = [
            'email' => session('email'),
            'password' => session('password'),
            'name' => (($request->session()->has('name')) ? session('name'): session('email')),
            'enabled' => 1
        ];
        if(!User::create($admin)->roles()->attach(1))
        {
            Flash::error(trans('installer.failed.admin'))->important();
            return redirect('installer/fail');
        }

        return redirect('installer/finish');
    }

    public function finish()
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        \Request::session()->flush();
        return view('installer', [
            'form_url' => '',
            'form_method' => '',
            'screen' => 'installer.finish'
        ]);
    }

    public function fail()
    {
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.fallback_locale')));
        return view('installer', [
            'form_url' => '',
            'form_method' => '',
            'screen' => 'installer.failed'
        ]);
    }
}
