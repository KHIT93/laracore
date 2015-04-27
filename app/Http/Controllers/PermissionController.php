<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$role = Role::find(2);
        //dd($role->perms);
		return view('admin.permissions', ['roles' => Role::where('name', '<>', 'administrator')->get(), 'permissions' => Permission::all()]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        foreach ($request->all()['permission'] as $role => $permission)
        {
        	$entity = Role::find($role);
            $entity->perms()->sync($permission);
            \Flash::success('The permission assignment has been updated.');
            return redirect('admin/users/permissions');
        }
        
	}

}
