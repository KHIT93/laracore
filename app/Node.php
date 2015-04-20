<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model {

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
        return $this->belongsTo('App\User', 'author', 'uid');
    }
    
    /**
     * Gets the metadata for this node.
     * @return Metadata
     */
    public function metadata()
    {
        return $this->hasOne('App\Metadata', 'nid', 'nid');
    }
    
    /**
     * Gets all path aliases for this node.
     * @return Array
     */
    public function aliases()
    {
        return $this->hasMany('App\PathAlias', 'nid');
    }
    
    /**
     * Gets all nodes that are published
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published', '=', 1);
    }
    
}
