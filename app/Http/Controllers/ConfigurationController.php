<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TextFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        return view('admin.config.textformats.index', ['text_filters' => TextFilter::weighted()]);
    }

    public function editTextFormat(TextFilter $filter)
    {
        return view('admin.config.textformats.form', ['filter' => $filter]);
    }

    public function updateTextFormat(TextFilter $filter, Request $request)
    {
        $filter->update($request->all());
        \Flash::success('Text filter updated');
    }

    public function deleteTextFormat(TextFilter $filter)
    {
        if(in_array($filter->internal_name, TextFilter::defaults()))
        {
            \Flash::warning(string_format('The filter <i>@filter</i> cannot be deleted, since it is a default filter', ['@filter' => $filter->name]));
            return redirect('admin/config/text-formats');
        }
        else
        {
            return view('admin.config.textformats.delete');
        }
    }

    public function destroyTextFormat(TextFilter $filter, Request $request)
    {
        if(in_array($filter->internal_name, TextFilter::defaults()))
        {
            \Flash::warning(string_format('The filter <i>@filter</i> cannot be deleted, since it is a default filter', ['@filter' => $filter->name]));
        }
        else
        {
            $filter->delete();
            \Flash::success('The filter has been deleted');
        }
        return redirect('admin/config/text-formats');
    }

    public function content()
    {
        return view('admin.config.content.index');
    }

    public function postContent(Request $request)
    {
        $setting = Setting::whereKey('node_revision')->first();
        if($setting instanceof Setting)
        {
            $setting->update(['value' => $request->input('node_revision')]);
        }
        else
        {
            Setting::create(['key' => 'node_revision', 'value' => $request->input('node_revision')]);
        }
    }

    public function getCaching()
    {
        return view('admin.config.cache.index');
    }

    public function postCaching(Request $request)
    {
        $flag = false;
        try
        {
            \Cache::Flush();
            \Artisan::call('view:clear');
            \Artisan::call('route:clear');
            \Artisan::call('module:cache');
            \Artisan::call('config:clear');
            \Artisan::call('optimize');
            $flag = true;
        }
        catch (\Exception $ex)
        {
            $flag = false;
        }
        finally
        {
            if($flag)
            {
                \Flash::success('All application caches have been cleared');
            }
            else
            {
                \Flash::error('There was an error clearing the caches. See the error log for details');
            }
        }
        return redirect('admin/config/system/caching');
    }
}
