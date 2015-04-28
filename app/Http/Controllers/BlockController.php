<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BlockRequest;
use App\Http\Controllers\Controller;
use App\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{

     /**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
        eval_permission('access_admin_blocks');
		return view('admin.blocks', ['blocks' => Block::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
        eval_permission('access_admin_blocks');
        return view('admin.block_form', ['block' => new Block()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Redirect
	 */
	public function store(BlockRequest $request)
	{
            Block::create($request->all());
            \Flash::success('The new block has been created');
            return redirect('admin/blocks');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Block  $block
	 * @return View
	 */
	public function edit(Block $block)
	{
        eval_permission('access_admin_blocks');
        return view('admin.block_form', compact('block'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Block  $block
     * @param  BlockRequest  $request
	 * @return Redirect
	 */
	public function update(Block $block, BlockRequest $request)
	{
            $block->update($request->all());
            \Flash::success('The block has been updated');
            return redirect('admin/blocks');
	}

        /**
	 * Show the page for confirming the removal of the specified resource from storage.
	 *
	 * @param Block $block
	 * @return View
	 */
	public function remove(Block $block)
	{
        eval_permission('access_admin_blocks');
        return view('admin.blocks_delete', compact('block'));
	}
        
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Block  $block
	 * @return Redirect
	 */
	public function destroy(Block $block)
	{
            $block->delete();
            \Flash::success('The block has been deleted');
            return redirect('admin/blocks');
	}

}
