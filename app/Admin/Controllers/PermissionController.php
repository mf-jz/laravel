<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */
namespace App\Admin\Controllers;

use App\AdminPermission;

class PermissionController extends Controller
{
    // permissions
    public function index()
    {
        $permissions = AdminPermission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    // 权限添加
    public function create()
    {
        return view('admin.permission.create');
    }

    // 权限保存操作
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'description' => 'required'
        ]);

        AdminPermission::created(request('name', 'permission'));

        return redirect('/admin/permission');
    }
}
