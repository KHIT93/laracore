<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Menu;
use App\Http\Requests\MenuItemRequest;

use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create(Menu $menu)
	{
        eval_permission('access_admin_menus');
        return view('admin.menus_links_form', ['item' => new MenuItem(), 'menu' => $menu]);
	}

	/**
	 * Store a newly created resource in storage.
	 * @param MenuItemRequest $request
	 * @return Redirect
	 */
	public function store(MenuItemRequest $request, Menu $menu)
	{
		$menu->items()->create($request->all());
        \Flash::success('The new menu item has been created');
        return redirect('admin/menus/'.$menu->mid.'/links');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Menu  $menu
     * @param  MenuItem $item
	 * @return View
	 */
	public function edit(Menu $menu, MenuItem $item)
	{
        eval_permission('access_admin_menus');
        return view('admin.menus_links_form', compact('menu', 'item'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  MenuRequest  $request
     * @param  Menu  $menu
     * @param  MenuItem  $item
	 * @return Redirect
	 */
	public function update(MenuItemRequest $request, Menu $menu, MenuItem $item)
	{
            $item->update($request->all());
            \Flash::success('The menu item has been updated');
            return redirect('admin/menus/'.$menu->mid.'/links');
	}

	/**
	 * Show the page for confirming the removal of the specified resource from storage.
	 *
	 * @param Menu $menu
     * @param MenuItem $item
	 * @return View
	 */
	public function remove(Menu $menu, MenuItem $item)
	{
        eval_permission('access_admin_menus');
        return view('admin.menus_links_delete', compact('menu', 'item'));
	}
        
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Menu $menu
     * @param MenuItem $itm
	 * @return Redirect
	 */
	public function destroy(Menu $menu, MenuItem $item)
	{
            $item->delete();
            \Flash::success('The menu item has been deleted');
            return redirect('admin/menus/'.$menu->mid.'/links');
	}

}
