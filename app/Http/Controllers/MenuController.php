<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\MenuRequest;

use Illuminate\Http\Request;

class MenuController extends Controller
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
        eval_permission('access_admin_menus');
        return view('admin.menus.index', ['menus' => Menu::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.form', ['menu' => new Menu()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param MenuRequest $request
     * @return Redirect
     */
    public function store(MenuRequest $request)
    {
        Menu::create($request->all());
        \Flash::success('The new menu has been created');
        return redirect('admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return View
     */
    public function show(Menu $menu)
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.links.index', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return View
     */
    public function edit(Menu $menu)
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.form', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Menu $menu
     * @param MenuRequest $request
     * @return Redirect
     */
    public function update(Menu $menu, MenuRequest $request)
    {
        $menu->update($request->all());
        \Flash::success('The menu has been updated');
        return redirect('admin/menus');
    }

    /**
     * Show the page for confirming the removal of the specified resource from storage.
     *
     * @param Menu $menu
     * @return View
     */
    public function remove(Menu $menu)
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.delete', compact('menu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return Redirect
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        \Flash::success('The menu has been deleted');
        return redirect('admin/menus');
    }

}
