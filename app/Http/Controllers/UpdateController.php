<?php namespace App\Http\Controllers;


use app\Exceptions\Laracore\LaracoreUpdateException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Installer;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index()
    {
        return view('installer.update.index', ['update' => true]);
    }

    public function requirements()
    {
        $updater = new Installer();
        $validation = $updater->checkRequirementsAndStoragePermisions();
        if($updater->verifyRequirementsValidation($validation))
        {
            return redirect('update');
        }
        else
        {
            return view('installer.update.requirements');
        }
    }

    public function tasks()
    {
        return view('installer.update.tasks', ['tasks' => []]);
    }

    public function run()
    {
        try
        {
            \Artisan::call('laracore:update');
        }
        catch(\Exception $ex)
        {
            return view('installer.update.fail', ['error' => $ex]);
        }
    }

    public function finish()
    {

    }
}