<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Caffeinated\Modules\Facades\Module;
use Laracasts\Flash\Flash;

class ModulesController extends Controller
{
    public function index()
    {
        return view('admin.modules.index', ['modules' => Module::all()]);
    }

    public function bulkChange(Request $request)
    {
        foreach ($request->input('modules') as $module)
        {
            if(isset($module['enabled']) && !Module::isEnabled($module['slug']))
            {
                $this->enable($module['slug']);
            }
            else if(Module::isEnabled($module['slug']))
            {
                $this->disable($module['slug']);
            }
        }
    }

    public function add()
    {
        return view('admin.modules.add');
    }

    public function install(Request $request)
    {
        dd($request->all());
    }

    public function enable($slug, Request $request)
    {
        if(Module::enable($slug))
        {
            Flash::success('The module has been enabled');
        }
        else
        {
            Flash::error('The module could not be enabled');
        }
        return redirect('admin/modules');
    }

    public function disable($slug)
    {
        return view('admin.modules.disable', ['slug' => $slug]);
    }

    public function postDisable($slug)
    {
        if(Module::disable($slug))
        {
            Flash::success('The module has been disabled');
        }
        else
        {
            Flash::error('The module could not be disabled');
        }
        return redirect('admin/modules');
    }
}
