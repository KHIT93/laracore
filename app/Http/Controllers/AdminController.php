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
            //$this->middleware('permission', ['except' => ['show']]);
            $this->middleware('auth');
        }
        
        /**
         * 
         * @return Response
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
