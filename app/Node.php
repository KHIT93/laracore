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
        'status'
    ];
    
    /**
    * Alter the primary key
    * @var string 
    */
    protected $primaryKey = 'nid';

}
