<?php
// TODO : 要把需要限制的功能跟權限資料表做連動

namespace App\Http\Controllers\Admin\Menu;

use Illuminate\Http\Request;

class AdminMenuPermissionController extends BaseMenuItemController
{
    public function __construct()
    {
        $this->name = trans('adminMenu.items.settingParent.permission');

        $this->slug = 'permission';

        $this->permissions = ['settingParent permission'];

        $this->iconClasses = 'nav-icon far fa-sticky-note';
    }

    public function handle(Request $request)
    {
        $Roles = Role::all();
        $tmpRoles = $Roles;
        foreach($tmpRoles as $key => $role){
//            若是最高權限，就不用在編輯權限，所以不用在角色列表顯示。
            if($role->name == 'administrator'){
                unset($Roles[$key]);
                break;
            }
        }

        $user = Auth::user();
        return view('admin.setting.permission.permissionSetting',[
            'Roles' => $Roles,
            'user' => $user,
        ]);
    }
    

}