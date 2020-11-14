<?php
/** TODO : 增加預設帳號 以及 RoleSeeder和UserSeeder **/
return [
    // 角色
    'roles' => [
        ['name' => 'administrator', 'displayName' => 'Administrator'],
        ['name' => 'site manager', 'displayName' => 'siteManager'],
        ['name' => 'editor', 'displayName' => 'Editor'],
        ['name' => 'customer', 'displayName' => 'Customer'],
    ],
    // 權限
    'permissions' => [
        [
            //進入後台
            'name'         => 'admin area',
            'displayName'  => 'AdminArea',
            'assignTo'     => [
                'site manager', 'editor'
            ]
        ],
        [
            //設定
            'name'         => 'settingParent parent',
            'displayName'  => 'SettingParent',
            'assignTo'     => [
                'site manager', 'editor'
            ]
        ],
        [
            //設定 -> 權限
            'name'         => 'settingParent permission',
            'displayName'  => 'PermissionSetting',
            'assignTo'     => [
                'site manager'
            ]
        ],
    ],
];
