<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MenuItem;
use App\Menu;
use App\Http\Requests\MenuItemRequest;

use Illuminate\Http\Request;

class MenuItemController extends Controller {
    
        /**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            //$this->middleware('permission', ['except' => ['show']]);
            $this->middleware('auth');
        }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Menu $menu)
	{
            return view('admin.menus_links_form', ['item' => new MenuItem(), 'menu' => $menu]);
	}

	/**
	 * Store a newly created resource in storage.
	 * @param MenuItemRequest $request
	 * @return Response
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Menu $menu, MenuItem $item)
	{
            return view('admin.menus_links_form', compact('menu', 'item'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * @return Response
	 */
	public function remove(Menu $menu, MenuItem $item)
	{
            return view('admin.menus_links_delete', compact('menu', 'item'));
	}
        
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Menu $menu
	 * @return Response
	 */
	public function destroy(Menu $menu, MenuItem $item)
	{
            $item->delete();
            \Flash::success('The menu item has been deleted');
            return redirect('admin/menus/'.$menu->mid.'/links');
	}

}
