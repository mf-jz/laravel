<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */

namespace App\Admin\Controllers;


class UserController extends Controller
{

    // 用户管理列表
    public function index()
    {
        return view('admin/user/index');
    }

    // 用户添加页面
    public function add()
    {
        return view('admin/user/add');
    }

    // 用户保存
    public function store()
    {
        return ;
    }
}
