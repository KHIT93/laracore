<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return View
     */
    public function index()
    {
        eval_permission('access_admin_layout');
        return view('admin.layout');
    }

}
