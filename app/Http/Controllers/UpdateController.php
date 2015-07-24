<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Installer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class UpdateController extends Controller
{
    public function index()
    {
        /*$updater = new Installer();
        $validation = $updater->checkRequirementsAndStoragePermisions();
        if($updater->verifyRequirementsValidation($validation))
        {
            return view('installer.update.index', ['update' => true]);
        }
        else
        {
            return $this->requirements();
        }*/
        return view('installer.update.index', ['update' => true, 'active' => 'welcome']);
    }

    public function requirements()
    {
        $updater = new Installer();
        $validator = $updater->checkRequirementsAndStoragePermisions();
        if($updater->verifyRequirementsValidation($validator))
        {
            return redirect('update');
        }
        else
        {
            return view('installer.update.requirements', [
                'requirements' => $validator['requirements'],
                'storageperms' => $validator['storageperms'],
                'php_version' => $validator['php_version'],
                'active' => 'requirements'
            ]);
        }
    }

    public function tasks()
    {
        $query = \DB::select('SELECT * FROM `migrations`');
        $ran = [];
        foreach ($query as $entry) {
            $ran[] = $entry->migration;
        }

        $migration_files = scandir(database_path('migrations'), SCANDIR_SORT_ASCENDING);
        $migrations = [];
        foreach ($migration_files as $file) {
            if(strpos($file, '.php'))
            {
                $migrations[] = str_replace('.php', '', $file);
            }
        }
        $tasks = [];

        foreach ($migrations as $migration) {
            if(!in_array($migration, $ran))
            {
                $tasks[] = 'Run <i>' . $migration . '</i>';
            }
        }
        return view('installer.update.tasks', [
            'tasks' => $tasks,
            'update' => ((count($tasks)) ? true : false),
            'active' => 'tasks'
        ]);
    }

    public function run()
    {
        view()->composer('update', function($view){
            $view->with('active', 'run');
        });
        try
        {
            \Artisan::call('laracore:update');
        }
        catch(\Exception $ex)
        {
            return view('installer.update.finish', ['error' => $ex]);
        }
    }

    public function finish()
    {
        return view('installer.update.finish', ['active' => 'finish']);
    }
}