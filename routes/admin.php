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

        # 用户管理列表
        Route::get('users', '\App\Admin\Controllers\UserController@index');
        # 用户添加页面
        Route::get('users/add', '\App\Admin\Controllers\UserController@add');
        # 用户保存
        Route::post('users/store', '\App\Admin\Controllers\UserController@store');

        # 文章管理列表
        Route::get('posts', '\App\Admin\Controllers\PostController@index');
        # 文章管理操作
        Route::post('posts/{post}/status', '\App\Admin\Controllers\PostController@status');
    });
});
