<?php

namespace App\Http\Controllers;

use App\Libraries\Installer;
use App\Libraries\RequirementsChecker;
use App\Libraries\StoragePermissionChecker;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
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
        //Set locale
        \App::setLocale(((session('APP_LOCALE')) ? session('APP_LOCALE'): config('app.locale')));
        //Run middleware to check if the installer has been run before
        //$this->middleware('installed', ['except' => ['finish', 'fail']]);
    }

    public function welcome()
    {
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer',
            'screen' => 'installer.welcome',
            'btn_next' => [
                'text' => trans('installer.btn.start'),
                'disabled' => false,
                'render' => true
            ]
        ]);
    }

    public function postWelcome(Request $request)
    {
        $request->session()->put(['APP_LOCALE' => $request->input('langcode')]);
        return redirect('installer/license');
    }

    public function license()
    {
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/license',
            'screen' => 'installer.license',
            'btn_next' => [
                'text' => trans('installer.btn.next'),
                'disabled' => true,
                'render' => true
            ]
        ]);
    }

    public function postLicense(AcceptLicenseRequest $request)
    {
        return redirect('installer/requirements');
    }

    public function requirements()
    {
        $installer = new Installer();
        //Check if the requirements are passed, otherwise display requirements page
        $validator = $installer->checkRequirementsAndStoragePermisions();
        $validation = $installer->verifyRequirementsValidation($validator);
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/requirements',
            'screen' => 'installer.requirements',
            'requirements' => $validator['requirements'],
            'storageperms' => $validator['storageperms'],
            'php_version' => $validator['php_version'],
            'btn_next' => [
                'text' => trans('pagination.next'),
                'disabled' => $validation,
                'render' => true
            ]
        ]);
    }

    public function postRequirements(Request $request)
    {
        $installer = new Installer();
        $validation = $installer->checkRequirementsAndStoragePermisions();
        return ($installer->verifyRequirementsValidation($validation)) ? $this->requirements() : redirect('installer/database');
    }

    public function database($error = null)
    {
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/database',
            'screen' => 'installer.database',
            'error' => $error,
            'btn_next' => [
                'text' => trans('pagination.next'),
                'disabled' => false,
                'render' => true
            ]
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
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/site',
            'screen' => 'installer.site',
            'btn_next' => [
                'text' => trans('installer.btn.install'),
                'disabled' => false,
                'render' => true
            ]
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
        return view('installer', [
            'form_method' => 'POST',
            'form_url' => 'installer/run',
            'screen' => 'installer.install',
            'btn_next' => [
                'text' => trans('pagination.next'),
                'disabled' => false,
                'render' => false
            ]
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
            logger('Installer.ERROR: Could not do the final config of ENV');
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
        if(User::create($admin) == false)
        {
            logger('Could not create the administrator account');
            Flash::error(trans('installer.failed.admin'))->important();
            return redirect('installer/fail');
        }
        else
        {
            try
            {
                User::find(1)->roles()->attach(1);
            }
            catch(\Exception $ex)
            {
                Flash::error(trans('installer.failed.admin'))->important();
                return redirect('installer/fail');
            }
        }
        try
        {
            Setting::create(['key' => 'site_name', 'value' => session('site_name')]);
            Setting::create(['key' => 'site_slogan', 'value' => '']);
            Setting::create(['key' => 'site_email', 'value' => session('site_email')]);
            Setting::create(['key' => 'site_country', 'value' => session('site_country')]);
        }
        catch(\Exception $ex)
        {
            Flash::error(trans('installer.failed.settings'))->important();
            return redirect('installer/fail');
        }

        return redirect('installer/finish');
    }

    public function finish()
    {
        \Request::session()->flush();
        return view('installer', [
            'form_url' => '',
            'form_method' => '',
            'screen' => 'installer.finish',
            'btn_next' => [
                'text' => trans('pagination.next'),
                'disabled' => false,
                'render' => false
            ]
        ]);
    }

    public function fail()
    {
        return view('installer', [
            'form_url' => '',
            'form_method' => '',
            'screen' => 'installer.failed',
            'btn_next' => [
                'text' => trans('pagination.next'),
                'disabled' => false,
                'render' => false
            ]
        ]);
    }
}
