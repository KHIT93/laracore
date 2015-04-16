<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Node;
use App\Metadata;
use App\PathAlias;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            return view('admin.content_form_add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
            $data = $request->all();
            $data['content']['author'] = \Auth::user()->uid;
            $node = Node::create($data['content']);
            $data['meta']['nid'] = $node->nid;
            $metadata = Metadata::create($data['meta']);
            //$url = (empty(trim($data['url']['alias']))) ? Str::slug($node->title) : $data['url']['alias'];
            return PathAlias::create(['nid' => $node->nid, 'alias' => Str::slug($node->title)]);
            flash('The new node has been created');
            return redirect('admin/content');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $nid
	 * @return Response
	 */
	public function show($nid)
	{
            $node = Node::find($nid);
            $metadata = $node->metadata()->first();
            $user = $node->author()->first();
            return compact('node', 'metadata', 'user');
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
            $node = Node::find($nid);
            $meta = $node->metadata()->first();
            $urls = $node->aliases()->getResults();
            return view('admin.content_form_edit', compact('node', 'meta', 'urls'));
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
