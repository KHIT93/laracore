<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\BlockRequest;
use App\Http\Controllers\Controller;
use App\Block;
use Illuminate\Http\Request;

class BlockController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.blocks', ['blocks' => Block::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return view('admin.block_form', ['block' => new Block()]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Block $block)
	{
            return view('admin.block_form', compact('block'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * @param Menu $menu
	 * @return Response
	 */
	public function remove(Block $block)
	{
            return view('admin.blocks_delete', compact('block'));
	}
        
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Block $block)
	{
            $block->delete();
            \Flash::success('The block has been deleted');
            return redirect('admin/blocks');
	}

}
