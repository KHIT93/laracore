<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PathAlias extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'url_alias';

    protected $fillable = [
        'nid',
        'alias',
    ];

    /**
     * Returns the node relationship
     * @return Node
     */
    public function node()
    {
        return $this->belongsTo('App\Node', 'nid');
    }

}
