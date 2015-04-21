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
            //$this->middleware('permission', ['except' => ['show']]);
            $this->middleware('auth');
        }
        
        /**
         * 
         * @return Response
         */
        public function index()
        {
            return view('admin.layout');
        }

}
