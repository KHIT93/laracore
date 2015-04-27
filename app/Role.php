<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    public function permissions()
    {
        $permissionList = $this->perms;
        $output = array();
        foreach ($permissionList as $permission)
        {
        	$output[] = $permission->id;
        }
        
        return $output;
    }
}
