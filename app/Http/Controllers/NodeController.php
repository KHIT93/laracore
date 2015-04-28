<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\NodeRequest;
use App\Http\Controllers\Controller;
use App\Node;
use App\Metadata;
use App\PathAlias;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        eval_permission('access_admin_content');
        $data = Node::all();
        return view('admin.content', ['nodes' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        eval_permission('access_admin_content');
        return view('admin.content_form_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    public function store(NodeRequest $request)
    {
        $data = $request->all();
        $data['content']['author'] = \Auth::user()->uid;
        $node = Node::create($data['content']);
        $data['meta']['nid'] = $node->nid;
        $metadata = Metadata::create($data['meta']);
        $url_trim = trim($data['url']['alias']);
        $url = (empty($url_trim) || $url_trim == '') ? Str::slug($node->title) : Str::slug($data['url']['alias']);
        PathAlias::create(['nid' => $node->nid, 'alias' => $url]);
        \Flash::success('The new node has been created');
        return redirect('admin/content');
    }

    /**
     * Display the specified resource.
     *
     * @param  Node  $node
     * @return View
     */
    public function show(Node $node)
    {
        return view('node', compact('node'));
    }
        
    public function showDefault()
    {
        return view('node', ['node' => Node::find(1)]);
    }
        
    public function resolve(PathAlias $path_alias)
    {
        return $this->show($path_alias->node()->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Node  $node
     * @return View
     */
    public function edit(Node $node)
    {
        eval_permission('access_admin_content');
        $meta = $node->metadata()->first();
        $urls = $node->aliases()->getResults();
        return view('admin.content_form_edit', compact('node', 'meta', 'urls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Node  $node
 * @param NodeRequest $request
     * @return Redirect
     */
    public function update(Node $node, NodeRequest $request)
    {
        $data = $request->all();
        $node->update($data['content']);
        $metadata = $node->metadata()->first();
        $metadata->update($data['meta']);
        \Flash::success('The node has been updated');
        return redirect('admin/content');
    }

    /**
     * Show the page for confirming the removal of the specified resource from storage.
     * @param Node $node
     * @return View
     */
    public function remove(Node $node)
    {
        eval_permission('access_admin_content');
        return view('admin.content_form_delete', compact('node'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Node  $node
     * @return Redirect
     */
    public function destroy(Node $node)
    {
        $node->delete();
        \Flash::success('The node has been deleted');
        return redirect('admin/content');
    }

}
