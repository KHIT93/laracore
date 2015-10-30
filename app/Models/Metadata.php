<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{

    protected $table = 'metadata';

    protected $fillable = [
        'nid',
        'title',
        'keywords',
        'description',
        'robots'
    ];

    /**
     * Alter the primary key
     * @var string
     */
    protected $primaryKey = 'nid';

    /**
     * Returns the node associated with this record.
     * @return Node
     */
    public function node()
    {
        return $this->belongsTo(\App\Models\Node::class, 'nid', 'nid');
    }
}
