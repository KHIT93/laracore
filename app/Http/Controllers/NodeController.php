<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\NodeRequest;
use App\Http\Controllers\Controller;
use App\Libraries\Page;
use App\Libraries\Theme;
use App\Models\Node;
use App\Models\Metadata;
use App\Models\NodeRevision;
use App\Models\PathAlias;
use App\Models\Setting;

use Collective\Html\HtmlFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Symfony\Component\Console\Application;

class NodeController extends Controller
{
    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'showDefault', 'resolve']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        eval_permission('access_admin_content');
        return view('admin.node.index', ['nodes' => Node::paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        eval_permission('access_admin_content');
        return view('admin.node.form_add');
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
        PathAlias::create(['source' => 'node/'.$node->nid, 'alias' => $url]);
        \Flash::success('The new node has been created');
        return redirect('admin/content');
    }

    /**
     * Display the specified resource.
     *
     * @param  Node $node
     * @return View
     */
    public function show(Node $node)
    {
        if ($node == null) {
            abort(404);
        } else {
            Page::getInstance()->title = $node->metadata()->first()->title;
            Page::getInstance()->entity = $node;
            return view(Theme::template('node'), ['node' => $node, 'title' => Page::getInstance()->title, 'metadata' => Page::getInstance()->metadata]);
        }
    }

    /**
     * Display the specified revision of the resource.
     * @param Node $parent
     * @param NodeRevision $revision
     * @return View
     */
    public function revision(Node $parent, NodeRevision $revision)
    {
        $node = new Node();
        $node->nid = $revision->nid;
        $node->title = $revision->title;
        $node->body = $revision->body;
        $node->author = $revision->node->author()->first()->uid;
        $node->published = $revision->published;
        return $this->show($node);
    }

    public function showDefault()
    {
        $node = null;
        if (!count(Node::all()))
        {
            $node = new Node;
            $node->title = 'No content available';
            $node->body = 'There is currently no content available for display. Please log in and ' . HtmlFacade::link('admin/content', 'Create some content');
            Page::getInstance()->entity = $node;
            //return view('node', ['node' => $node]);
            return view(Theme::template('page'));
        }
        else
        {
            $site_home = Setting::get('site_home');
            return $this->show(Node::findOrFail($site_home));
        }

    }

    public function resolve(PathAlias $path_alias)
    {
        $node = null;
        if ($path_alias->node()->first() instanceof Node) {
            return $this->show($path_alias->node()->first());
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Node $node
     * @return View
     */
    public function edit(Node $node)
    {
        eval_permission('access_admin_content');
        $meta = $node->metadata()->first();
        return view('admin.node.form_edit', compact('node', 'meta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Node $node
     * @param NodeRequest $request
     * @return Redirect
     */
    public function update(Node $node, NodeRequest $request)
    {
        $data = $request->all();
        $node->revision();
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
        return view('admin.node.delete', compact('node'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Node $node
     * @return Redirect
     */
    public function destroy(Node $node)
    {
        $node->delete();
        \Flash::success('The node has been deleted');
        return redirect('admin/content');
    }

    /**
     * Remove the specified revision of the resource from storage.
     *
     * @param  Node $node
     * @return Redirect
     */
    public function destroyRevision(Node $node, NodeRevision $revision)
    {
        $revision->delete();
        \Flash::success('The node revision has been deleted');
        return redirect('node/'.$node-nid.'/edit');
    }

}
