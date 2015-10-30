<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        eval_permission('access_admin_config');
        return view('admin.config.index');
    }

    public function getSite()
    {
        eval_permission('access_admin_config');
        return view('admin.config.site.index', ['nodes' => \App\Models\Node::all()->lists('title', 'nid')]);
    }

    public function postSite(Request $request)
    {
        $output = array();
        foreach ($request->all() as $key => $value) {
            $output[$key] = $value;
        }
        unset($output['_token']);
        foreach ($output as $key => $value) {
            $setting = Setting::whereKey($key)->first();
            $setting->update(['value' => $value]);
        }
        return redirect('admin/config');

    }

    public function getMaintenance()
    {
        return view('admin.config.maintenance.index');
    }

    public function postMaintenance(Request $request)
    {
        $output = array();
        foreach ($request->all() as $key => $value) {
            $output[$key] = $value;
        }
        if(!$request->input('site_maintenance'))
        {
            $output['site_maintenance'] = 0;
        }
        unset($output['_token']);
        foreach ($output as $key => $value) {
            $setting = Setting::whereKey($key)->first();
            $setting->update(['value' => $value]);
        }
        return redirect('admin/config');
    }

    public function textFormats()
    {
        return view('admin.config.textformats.index');
    }
}
