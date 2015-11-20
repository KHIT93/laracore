<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nodes';

    protected $fillable = [
        'title',
        'body',
        'author',
        'published'
    ];

    /**
     * Alter the primary key
     * @var string
     */
    protected $primaryKey = 'nid';

    /**
     * Gets the author of the node.
     * @return User
     */
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author', 'uid');
    }

    /**
     * Gets the metadata for this node.
     * @return Metadata
     */
    public function metadata()
    {
        return $this->hasOne(\App\Models\Metadata::class, 'nid', 'nid');
    }

    /**
     * Gets all revisions of this node.
     * @return Collection
     */
    public function revisions()
    {
        return $this->hasMany(\App\Models\NodeRevision::class, 'nid', 'nid');
    }

    /**
     * Gets all nodes that are published
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published', '=', 1);
    }

    /**
     * Gets all nodes that are unpublished
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published', '=', 0);
    }

    /**
     * Create new revision
     */
    public function revision()
    {
        $this->revisions()->create([
            'nid' => $this->nid,
            'title' => $this->title,
            'body' => $this->body,
            'editor' => \Auth::user()->uid,
            'published' => $this->published
        ]);
    }

    public function header()
    {
        return [
            'title' => (($this->metadata()->first()->title != '') ? $this->metadata()->first()->title : $this->title),
            'metadata' => view('partials._meta', ['name' => 'description', 'content' => $this->metadata()->first()->description])
                . view('partials._meta', ['name' => 'keywords', 'content' => $this->metadata()->first()->keywords])
                . view('partials._meta', ['name' => 'robots', 'content' => $this->metadata()->first()->robots])
        ];
    }

}
