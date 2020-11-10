<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Traits\PermissionGateProtectable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

/**
 * 使用者帳號
 *
 * Class PermissionController
 * @package App\Http\Controllers\
 */
class PermissionController extends Controller
{
    public function updateRolePermission(Request $request, $id=null)
    {
        $role = Role::findById($id);

        $permission_array = $request->get('permission');


        //更新角色權限
        $remove_permission_name = array();
        $the_role_has_permission_name = array();

        //新增
        if(!empty($permission_array)){
            foreach ($permission_array as $permission_name){
                //判斷要更新的權限名稱是否存在，若存在就給予此角色權限
                if(!empty(Permission::where('display_name', $permission_name)->get()->toArray())){
                    $permission = Permission::where('display_name', $permission_name)->get();
                    $role->givePermissionTo($permission);
                }
                array_push($the_role_has_permission_name, $permission_name);
            }
        }



        foreach (Permission::all()->toArray() as $single_permission){
            if(!in_array($single_permission['display_name'], $the_role_has_permission_name)){
                array_push($remove_permission_name, $single_permission['display_name']);
            }
        }

        //刪除
        foreach ($role->permissions()->get()->toArray() as $this_role_permission){
            if(in_array($this_role_permission['display_name'], $remove_permission_name)){
                $permission = Permission::where('display_name', $this_role_permission['display_name'])->get();
                $role->revokePermissionTo($permission);
            }
        }
    }
}