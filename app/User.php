<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function checkUserPermissionLevel($user_id = 0)
    {
        $user = User::find($user_id);
        $allRoleLevel = array();
        if (in_array('administrator', $user->getRoleNames()->toArray())) {
            array_push($allRoleLevel, 'administrator');
            array_push($allRoleLevel, 'site manager');
            array_push($allRoleLevel, 'editor');
            array_push($allRoleLevel, 'customer');
        } else if (in_array('site manager', $user->getRoleNames()->toArray())) {
            array_push($allRoleLevel, 'editor');
            array_push($allRoleLevel, 'customer');
        }
        return $allRoleLevel;
    }

}