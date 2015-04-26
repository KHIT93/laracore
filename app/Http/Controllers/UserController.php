<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

        /**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            //$this->middleware('permission', ['except' => ['show']]);
            $this->middleware('auth');
        }
        
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
            if(!has_permission('access_admin_dashboard'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
            return view('admin.users', ['users' => User::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
            if(!has_permission('access_admin_dashboard'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
            return view('admin.users_form', ['user' => new User()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Redirect
	 */
	public function store(UserRequest $request)
	{
            User::create($request->all());
            \Flash::success('The new user has been created');
            return redirect('admin/users');
	}

        /**
	 * Display the current Authenticated User resource.
	 *
	 * @return View
	 */
	public function showCurrent()
	{
            return view('user_profile', ['user' => auth()->user()]);
	}
        
	/**
	 * Display the specified resource.
	 *
	 * @param  User  $user
	 * @return View
	 */
	public function show(User $user)
	{
            return view('user_profile', ['user' => $user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  User  $user
	 * @return View
	 */
	public function edit(User $user)
	{
            if(!has_permission('access_admin_dashboard'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
            return view('admin.users_form', ['user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  User  $user
     * @param  Request  $request
	 * @return Redirect
	 */
	public function update(User $user, Request $request)
	{
            $user->update($request->all());
            \Flash::success('The user has been updated');
            return redirect('admin/users');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return View
     */
	public function remove(User $user)
	{
            if(!has_permission('access_admin_dashboard'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
            return view('admin.users_delete', compact('role'));
	}
    
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  User  $user
	 * @return Redirect
	 */
	public function destroy(User $user)
	{
            $user->delete($user);
            \Flash::success('The user has been deleted');
            return redirect('admin/users');
	}

}
