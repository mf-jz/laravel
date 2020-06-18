<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2018/12/26
 * Time: 11:15
 */
Route::group(['prefix' => 'admin'], function () {
    # 登录页面
    Route::get('login', '\App\Admin\Controllers\LoginController@index')->name('admin.login');
    # 登录动作
    Route::post('login', '\App\Admin\Controllers\LoginController@login');
    # 退出动作
    Route::get('logout', '\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        # 后台首页
        Route::get('home', '\App\Admin\Controllers\HomeController@index');

        Route::group(['middleware' => 'can:system'], function () {
            # 用户管理列表
            Route::get('users', '\App\Admin\Controllers\UserController@index');
            # 用户添加页面
            Route::get('users/add', '\App\Admin\Controllers\UserController@add');
            # 用户保存
            Route::post('users/store', '\App\Admin\Controllers\UserController@store');
            # 用户角色列表
            Route::get('users/{user}/role', '\App\Admin\Controllers\UserController@role');
            # 用户分配角色
            Route::post('users/{user}/role', '\App\Admin\Controllers\UserController@storeRole');

            # 角色列表页面
            Route::get('roles', '\App\Admin\Controllers\RoleController@index');
            # 角色添加
            Route::get('roles/create', '\App\Admin\Controllers\RoleController@create');
            # 角色保存操作
            Route::post('roles/store', '\App\Admin\Controllers\RoleController@store');
            # 角色权限列表
            Route::get('roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
            # 角色分配权限
            Route::post('roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission');

            # 权限列表页面
            Route::get('permissions', '\App\Admin\Controllers\PermissionController@index');
            # 权限添加
            Route::get('permissions/create', '\App\Admin\Controllers\PermissionController@create');
            # 权限保存操作
            Route::post('permissions/store', '\App\Admin\Controllers\PermissionController@store');
        });

        Route::group(['middleware' => 'can:post'], function () {
            # 文章管理列表
            Route::get('posts', '\App\Admin\Controllers\PostController@index');
            # 文章管理操作
            Route::post('posts/{post}/status', '\App\Admin\Controllers\PostController@status');
        });

        Route::group(['middleware' => 'can:topic'], function () {
            # 专题管理
            Route::resource('topics', '\App\Admin\Controllers\TopicController', [
                'only' => ['index', 'create', 'store', 'destroy']
            ]);
        });

        Route::group(['middleware' => 'can:notice'], function () {
            # 通知管理
            Route::resource('notices', '\App\Admin\Controllers\NoticeController', [
                'only' => ['index', 'create', 'store']
            ]);
        });

        Route::group(['middleware' => 'can:country'], function () {
            # 县区列表
            Route::get('countries', '\App\Admin\Controllers\CountryController@index');
            # 县区添加页面
            Route::get('countries/create', '\App\Admin\Controllers\CountryController@create');
            # 县区保存操作
            Route::post('countries/store', '\App\Admin\Controllers\CountryController@store');
            # 县区管理操作
            Route::post('countries/{country}/status', '\App\Admin\Controllers\CountryController@status');
        });

        Route::group(['middleware' => 'can:heart'], function () {
            # 爱心榜单
            Route::get('hearts', '\App\Admin\Controllers\HeartController@index');
            # 爱心榜单添加页面
            Route::get('hearts/create', '\App\Admin\Controllers\HeartController@create');
            # 爱心榜单保存操作
            Route::post('hearts/store', '\App\Admin\Controllers\HeartController@store');
            # 爱心榜单管理操作
            Route::post('hearts/{heart}/status', '\App\Admin\Controllers\HeartController@status');
        });
    });
});
