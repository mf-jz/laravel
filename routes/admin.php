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
    });
});
