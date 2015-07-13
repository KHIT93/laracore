<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateRedirectRequest;
use App\Http\Controllers\Controller;
use App\PathAlias;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    /**
     * Main configuration page for redirexts and path aliases
     * @return View
     */
    public function index()
    {
        return view('admin.config_redirect', ['redirects' => PathAlias::all()]);
    }

    public function store(Request $request)
    {
        PathAlias::create($request->all());
        \Flash::success('New redirection has been created');
        return redirect('admin/config/redirect');
    }
}
