<?php

namespace App\Traits;

trait CanHaveRole
{
    public function assignRole($role)
    {
        if (is_string($role))
        {
            $obj = null;
            try
            {
                $obj = Role::whereName($role)->firstOrFail();
            }
            catch (\ModelNotFoundException $ex)
            {
                \Flash::error('The supplied role does not exist');
            }

            if ($obj instanceof Role)
            {
                $this->roles()->attach($obj);
                \Flash::success('The role has been connected to the user');
            }
        }
        if ($this->roles()->attach($role))
        {
            \Flash::success('The role has been connected to the user');
        }
        else
        {
            \Flash::error('Something went wrong while attaching the role to the user');
        }
        return back();
    }

    public function hasRole($role)
    {
        if (is_string($role))
        {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }
}