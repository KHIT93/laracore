<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class ConfigurationController extends Controller {

	public function __construct()
        {
            
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
            foreach ($request->all() as $key => $value)
            {
            	$output[$key] = $value;
            }
            unset($output['_token']);
            foreach ($output as $key => $value)
            {
            	$setting = Setting::whereKey($key);
                $setting->update(['value' => $value]);
            }
            return redirect('admin/config');
            
        }

        public function getMaintenance()
        {
            return view('admin.config_maintenance');
        }
        
        public function postMaintenance()
        {
            
        }
}
