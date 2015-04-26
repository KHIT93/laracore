<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\MenuRequest;

use Illuminate\Http\Request;

class MenuController extends Controller {

	/**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            if(!has_permission('access_admin_ui') || !has_permission('access_admin_menus'))
            {
                abort(403, 'You do not have access to the specified resource.');
            }
        }
        
        /**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
            return view('admin.menus', ['menus' => Menu::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
            return view('admin.menus_form', ['menu' => new Menu()]);
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
	 * @param  Menu  $menu
	 * @return View
	 */
	public function show(Menu $menu)
	{
            return view('admin.menus_links', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Menu $menu
	 * @return View
	 */
	public function edit(Menu $menu)
	{
            return view('admin.menus_form', ['menu' => $menu]);
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
            return view('admin.menus_delete', compact('menu'));
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
