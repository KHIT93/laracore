<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    protected $fillable = [
        'permission',
        'name',
        'description',
        'roles'
    ];
    
    /**
    * Alter the primary key
    * @var string 
    */
    protected $primaryKey = 'pid';

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role', 'permission', 'rid');
    }
}
