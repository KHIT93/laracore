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

}
