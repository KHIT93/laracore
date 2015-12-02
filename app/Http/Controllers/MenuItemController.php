<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Menu;
use App\Http\Requests\MenuItemRequest;

use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Menu $menu)
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.links.form', ['item' => new MenuItem(), 'menu' => $menu]);
    }

    /**
     * Bulk update all menu items in the request
     * @param Request $request
     */
    public function updatePositions(Request $request)
    {
        dd($request->input('items'));
        foreach ($request->input('items') as $update)
        {
            $update['active'] = (isset($update['active']) && !is_null($update['active'])) ? 1 : 0;
            try
            {
                $item = MenuItem::findOrFail($update['bid']);
                $item->update($update);
            }
            catch(\Illuminate\Database\Eloquent\ModelNotFoundException $ex)
            {
                \Flash::error('The menu item <i>'.$item->name.'</i> was not updated due to an error.<strong>'.$ex->getMessage().'</strong>');
            }
        }
        \Flash::success('The menu settings have been updated');
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
        return redirect('admin/menus/' . $menu->mid . '/links');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @param  MenuItem $item
     * @return View
     */
    public function edit(Menu $menu, MenuItem $item)
    {
        eval_permission('access_admin_menus');
        return view('admin.menus.links.form', compact('menu', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuRequest $request
     * @param  Menu $menu
     * @param  MenuItem $item
     * @return Redirect
     */
    public function update(MenuItemRequest $request, Menu $menu, MenuItem $item)
    {
        $item->update($request->all());
        \Flash::success('The menu item has been updated');
        return redirect('admin/menus/' . $menu->mid . '/links');
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
        return view('admin.menus.links.delete', compact('menu', 'item'));
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
        return redirect('admin/menus/' . $menu->mid . '/links');
    }

}
