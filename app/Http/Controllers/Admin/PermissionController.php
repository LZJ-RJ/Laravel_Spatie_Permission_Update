<?php

// TODO : 要把需要限制的功能跟權限資料表做連動

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function edit($id)
    {
        $tmpAllPermission = Role::findById($id)->getAllPermissions()->groupBy('display_name')->toArray();
        $allPermission = array();
        foreach ($tmpAllPermission as $permissionKey => $dontNeed){
            array_push($allPermission, $permissionKey);
        }
        $Role = Role::find($id);
        $RolehasPermissions = Config::get('data-presets.permissions');
        $permissions = $RolehasPermissions;
        foreach ($permissions as $index => $permission) {
            if(!empty($permission['assignTo'])) {
                if(!in_array($Role->name, $permission['assignTo'])){
                    unset($RolehasPermissions[$index]);
                }
            }
        }

//        此為進入到 app/Http/Controllers/Admin/PermissionController.php的update函式，也就是此檔案中的函式
        $dataArr['formSetting']['action'] = route('admin.permission.update', [$id] );
        $user = Auth::user();

        return view('admin.setting.permission.permissionSettingEdit' ,[
            'Permissions' => $allPermission,
            'RolehasPermissions' => $RolehasPermissions,
            'roleName' => $Role->display_name,
            'user' => $user,
            'dataArr' => $dataArr,
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findById($id);

        $permissionArray = $request->input('permission');

        //更新角色權限
        $removePermissionName = array();
        $theRoleHasPermissionName = array();

        //新增
        if(!empty($permissionArray)){
            foreach ($permissionArray as $permissionName){
                //判斷要更新的權限名稱是否存在，若存在就給予此角色權限
                if(!empty(Permission::where('display_name', $permissionName)->get()->toArray())){
                    $permission = Permission::where('display_name', $permissionName)->get();
                    $role->givePermissionTo($permission);
                }
                array_push($theRoleHasPermissionName, $permissionName);
            }
        }

        foreach (Permission::all()->toArray() as $singlePermission){
            if(!in_array($singlePermission['display_name'], $theRoleHasPermissionName)){
                array_push($removePermissionName, $singlePermission['display_name']);
            }
        }

        //刪除
        foreach ($role->permissions()->get()->toArray() as $thisRolePermission){
            if(in_array($thisRolePermission['display_name'], $removePermissionName)){
                $permission = Permission::where('display_name', $thisRolePermission['display_name'])->get();
                $role->revokePermissionTo($permission);
            }
        }


        return redirect()->back();
    }
}