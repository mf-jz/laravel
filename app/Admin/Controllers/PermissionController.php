<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */
namespace App\Admin\Controllers;

class PermissionController extends Controller
{
    // permissions
    public function index()
    {
        return view('admin.permission.index');
    }

    // 权限添加
    public function create()
    {
        return view('admin.permission.create');
    }

    // 权限保存操作
    public function store()
    {

    }
}
