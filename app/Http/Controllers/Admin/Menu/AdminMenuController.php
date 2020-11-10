<?php
//客製設定權限的地方，下方只是範例設定格式。
// TODO : 要把需要限制的功能跟權限資料表做連動

namespace App\Http\Controllers\Admin\Menu\;

use Illuminate\Http\Request;

class AdminMenuController extends BaseMenuItemController
{
    public function __construct()
    {
        $this->name = '後台菜單';

        $this->slug = 'admin menu';

        $this->permissions = ['admin menu adminMenu01'];

        $this->iconClasses = 'nav-icon far fa-sticky-note';
    }

    public function handle(Request $request)
    {
        return view('admin.menu');
    }
}
