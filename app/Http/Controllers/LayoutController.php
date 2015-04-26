<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LayoutController extends Controller {

	/**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            if(!has_permission('access_admin_ui') || !has_permission('access_admin_layout'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
        }
        
        /**
         * 
         * @return View
         */
        public function index()
        {
            return view('admin.layout');
        }

}
