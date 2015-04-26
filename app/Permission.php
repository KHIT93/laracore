<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

    /*protected $fillable = [
        'permission',
        'name',
        'description',
        'roles'
    ];*/
    
    /**
    * Alter the primary key
    * @var string 
    */
    /*protected $primaryKey = 'pid';

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role', 'permission', 'rid');
    }*/
}
