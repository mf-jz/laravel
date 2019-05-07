<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */
namespace App\Admin\Controllers;

class RoleController extends Controller
{
    // 角色列表页面
    public function index()
    {
        return view('admin.role.index');
    }

    // 角色添加
    public function create()
    {
        return view('admin.role.create');
    }

    // 角色保存操作
    public function store()
    {

    }

    // 角色权限列表
    public function permission()
    {
        return view('admin.role.permission');
    }

    // 角色分配权限
    public function storePermission()
    {

    }
}
