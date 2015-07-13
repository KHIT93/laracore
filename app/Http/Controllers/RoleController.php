<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        eval_permission('access_admin_users');
        return view('admin.roles', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        \FlashTest::succes('The new role has been created');
        return redirect('admin/users/roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        eval_permission('access_admin_users');
        return view('admin.roles_form', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Role $role
     * @param  RoleRequest $request
     * @return Redirect
     */
    public function update(Role $role, RoleRequest $request)
    {
        $role->update($request->all());
        \Flash::success('The role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return View
     */
    public function remove(Role $role)
    {
        eval_permission('access_admin_users');
        return view('admin.roles_delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return Redirect
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('admin/users/roles');
    }

}
