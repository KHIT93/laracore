<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            if(!has_permission('access_admin_ui') || !has_permission('access_admin_dashboard'))
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
            $items = \App\MenuItem::where('mid', '=', 2)->get();
            foreach ($items as $key => $item) {
                if($item->parent > 0)
                {
                    $items[$item->parent]->childs[] = $item;
                    unset($items[$key]);
                }
            }
            //dd(\App\MenuItem::where('mid', '=', 2)->get());
            return view('admin.dashboard', ['items' => $items]);
        }

}
