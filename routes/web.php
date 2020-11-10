<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * 自訂「更新權限」的路徑
 */
Route::get('/updateRolePermission/{id}', 'PermissionController@updateRolePermission')->name('updateRolePermission');
