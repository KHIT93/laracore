<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\ScheduledTask;
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
        return view('admin.config');
    }

    public function getSite()
    {
        eval_permission('access_admin_config');
        return view('admin.config_site', ['nodes' => \App\Node::all()->lists('title', 'nid')]);
    }

    public function postSite(Request $request)
    {
        $output = array();
        foreach ($request->all() as $key => $value) {
            $output[$key] = $value;
        }
        unset($output['_token']);
        foreach ($output as $key => $value) {
            $setting = Setting::whereKey($key);
            $setting->update(['value' => $value]);
        }
        return redirect('admin/config');

    }

    public function getMaintenance()
    {
        return view('admin.config_maintenance');
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

    public function getCron()
    {
        return view('admin.config_cron', ['tasks' => ScheduledTask::all()]);
    }

    public function getCronExecute()
    {
        \Artisan::call('schedule:run');
        \Flash::info('Cron execution has been started. Any errors are shown below');
        return redirect('admin/config/system/cron');
    }

    public function postCron(Request $request)
    {
        ScheduledTask::create($request->all());
        \Flash::success('The new task has been created');
        return redirect('admin/config/system/cron');
    }

    public function textFormats()
    {
        return view('admin.config_textformats');
    }
}
