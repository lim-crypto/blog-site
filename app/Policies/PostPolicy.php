<?php

namespace App\Policies;

use App\Model\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $user)
    {
        //
    }

    public function view(Admin $user)
    {
        //
    }

    public function create(Admin $user)
    {
        return  $this->getPermission($user, 1);
    }

    public function update(Admin $user)
    {
        return  $this->getPermission($user, 2);
    }

    public function delete(Admin $user)
    {
        return  $this->getPermission($user, 3);
    }
    public function publish(Admin $user)
    {
        return  $this->getPermission($user, 4);
    }

    public function tag(Admin $user)
    {
        return  $this->getPermission($user, 8);
    }
    public function category(Admin $user)
    {
        return  $this->getPermission($user,9);
    }
    public function restore(Admin $user)
    {
        //
    }

    public function forceDelete(Admin $user)
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
