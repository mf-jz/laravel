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

Route::get('/', "\App\Http\Controllers\LoginController@index");

#注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
#注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
#登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index')->name('login');
#登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');
#登出行为
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');

Route::group(['middleware' => 'auth:web'], function () {
    #个人设置页面
    Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
    #个人设置操作
    Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');

    #文章列表页
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
    #文章创建
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::post('/posts', '\App\Http\Controllers\PostController@store');
    #首页搜索
    Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
    #文章详情页
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
    #文章编辑
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
    #文章删除
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
    #图片上传
    Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');
    #提交文章评论
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');
    #赞
    Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
    #取消赞
    Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unZan');

    #个人中心主页
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
    #关注
    Route::get('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
    #取消关注
    Route::get('/user/{user}/unfan', '\App\Http\Controllers\UserController@unFun');

    #主题详情页
    Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');
    #投稿
    Route::post('/topic/{topic}/submit', '\App\Http\Controllers\TopicController@submit');

    #通知
    Route::get('/notices', '\App\Http\Controllers\NoticeController@index');
});

include_once "admin.php";
