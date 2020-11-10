<?php
return [
    // 角色
    'roles' => [
		['name' => 'administrator', 'displayName' => 'Administrator'],
		['name' => 'site manager' , 'displayName' => 'Site Manager'],
		['name' => 'editor' , 'displayName' => 'Editor'],

	],
    // 權限
	'permissions' => [
        [
            //進入後台
            'name'         => 'admin area',
            'displayName'  => 'adminArea',
            'assignTo'     => [
                'site manager' ,'administrator'
            ]
        ],
        [
            //後台 - 儀錶板
            'name' => 'admin view dashboard',
            'displayName' => 'dashboard',
            'assignTo' => [
                'site manager'
            ]
        ],
        [
            //後台 - 權限設定
            'name' => 'admin view permissionEdit',
            'displayName' => 'PermissionEdit',
            'assignTo' => [
                'site manager'
            ]
        ],
        [
            //後台 - 菜單權限01 (範例權限，看此權限要用到或是要新增權限都可以自定義，此專案只是針對更新權限資料表的操作。)
            'name' => 'admin view adminMenu01',
            'displayName' => 'AdminMenu01',
            'assignTo' => [
                'site manager' , 'editor'
            ]
        ],
        [
            //後台 - 菜單權限02 (範例權限，看此權限要用到或是要新增權限都可以自定義，此專案只是針對更新權限資料表的操作。)
            'name' => 'admin view adminMenu02',
            'displayName' => 'AdminMenu02',
            'assignTo' => [
                'site manager' , 'editor'
            ]
        ],
	],
];
