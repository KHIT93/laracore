<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    /*protected $fillable = [
        'name'
    ];*/
    
    /**
    * Alter the primary key
    * @var string 
    */
    /*protected $primaryKey = 'rid';

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'permission', 'rid');
    }
    
    public function users()
    {
        return $this->hasMany('App\User', 'rid', 'role');
    }*/
}
