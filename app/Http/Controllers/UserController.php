<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Libraries\Page;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
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
        return view('admin.users.index', ['users' => User::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        eval_permission('access_admin_users');
        foreach (\App\Role::all() as $role) {
            if ($role->name != 'anonymous') {
                $roles[$role->id] = $role->display_name;
            }
        }
        return view('admin.users.form', ['user' => new User(), 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync([$request->input('role')]);
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
        return $this->show(auth()->user());
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function show(User $user)
    {
        Page::getInstance()->title = $user->name;
        Page::getInstance()->entity = $user;
        return view('users.profile', ['user' => $user, 'title' => $user->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user)
    {
        eval_permission('access_admin_users');
        foreach (\App\Role::all() as $role) {
            if ($role->name != 'anonymous') {
                $roles[$role->id] = $role->display_name;
            }
        }
        return view('admin.users.form', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @param  Request $request
     * @return Redirect
     */
    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        $user->roles()->sync([$request->input('role')]);
        \Flash::success('The user has been updated');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return View
     */
    public function remove(User $user)
    {
        eval_permission('access_admin_users');
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return Redirect
     */
    public function destroy(User $user)
    {
        $user->delete($user);
        \Flash::success('The user has been deleted');
        return redirect('admin/users');
    }

}
