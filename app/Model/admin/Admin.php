<?php

namespace App\Model\admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_roles');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

}
