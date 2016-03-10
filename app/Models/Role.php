<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function listPermissions()
    {
        $permissionList = $this->perms;
        $output = array();
        foreach ($permissionList as $permission) {
            $output[] = $permission->id;
        }

        return $output;
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'permission_role');
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}
