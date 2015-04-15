<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Node;

use Illuminate\Http\Request;

class NodeController extends Controller {

        /**
         * Constructor for adding middleware.
         */
        public function __construct()
        {
            //$this->middleware('permission', ['except' => ['show']]);
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $data = Node::all();
            return view('admin.content', ['nodes' => $data]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return view('admin.content_form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            Node::create(Request::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $nid
	 * @return Response
	 */
	public function show($nid)
	{
            //
	}
        
        /**
         * Display all resources.
         * @return Response
         */
        public function showAll()
        {
            
        }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $nid
	 * @return Response
	 */
	public function edit($nid)
	{
            //
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $nid
	 * @return Response
	 */
	public function update($nid)
	{
            //
	}

        /**
         * Show the page for confirming the removal of the specified resource from storage.
         * @param int $nid
         * @return Response
         */
        public function remove($nid)
        {
            //
        }
        
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $nid
	 * @return Response
	 */
	public function destroy($nid)
	{
            //
	}

}
