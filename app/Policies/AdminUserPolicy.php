<?php

namespace App\Policies;

use App\Model\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        //
    }


    public function view(Admin $admin)
    {
        //
    }

    public function create(Admin $admin)
    {
        return $this->getPermission($admin, 8);
    }


    public function update(Admin $admin)
    {
        return $this->getPermission($admin, 9);
    }

    public function delete(Admin $admin)
    {
        return $this->getPermission($admin, 10);
    }

    public function restore(Admin $admin)
    {
        //
    }


    public function forceDelete(Admin $admin)
    {
        //
    }

    protected function getPermission($user, $permission_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $permission_id) {
                    return true;
                }
            }
        }
    }
}
