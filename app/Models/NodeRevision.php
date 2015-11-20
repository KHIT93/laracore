<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NodeRevision extends Model
{
    protected $fillable = [
        'nid',
        'title',
        'body',
        'editor',
        'published'
    ];

    /**
     * Alter the primary key
     * @var string
     */
    protected $primaryKey = 'rid';

    /**
     * Gets the node connected to this revision.
     * @return Node
     */
    public function node()
    {
        return $this->belongsTo(\App\Models\Node::class, 'nid', 'nid');
    }

    public function revert()
    {
        $this->node()->update([
            'title' => $this->title,
            'body' => $this->body,
            'published' => $this->published
        ]);
    }

    /**
     * Gets the editor of the node revision.
     * @return User
     */
    public function editor()
    {
        return $this->belongsTo(\App\Models\User::class, 'editor', 'uid');
    }
}
