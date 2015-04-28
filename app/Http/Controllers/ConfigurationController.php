<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigurationController extends Controller {

	public function __construct()
        {
            if(!has_permission('acess_admin_ui') || !has_permission('access_admin_config'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
        }
        
        public function index()
        {
            return view('admin.config');
        }

}
