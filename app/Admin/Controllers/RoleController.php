<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */
namespace App\Admin\Controllers;

use App\AdminRole;
use App\AdminPermission;

class RoleController extends Controller
{
    // 角色列表页面
    public function index()
    {
        $roles = AdminRole::paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    // 角色添加
    public function create()
    {
        return view('admin.role.create');
    }

    // 角色保存操作
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'description' => 'required'
        ]);

        AdminRole::create(request(['name', 'description']));

        return redirect('/admin/roles');
    }

    // 角色权限列表
    public function permission(AdminRole $role)
    {
        // 所有权限
        $permissions = AdminPermission::all();
        // 角色拥有权限
        $rolePermission = $role->permissions;
        return view('admin.role.permission', compact('permissions', 'rolePermission', 'role'));
    }

    // 角色分配权限
    public function storePermission(AdminRole $role)
    {
        $this->validate(request(), [
            'permissions' => 'required|array'
        ]);

        $permissions = AdminPermission::findMany(request('permissions'));
        $myPermission = $role->permissions;

        // 要增加的权限
        $addPermission = $permissions->diff($myPermission);
        foreach ($addPermission as $permission) {
            $role->grantPermission($permission);
        }

        // 要删除的角色
        $deletePermission = $myPermission->diff($permissions);
        foreach ($deletePermission as $permission) {
            $role->deletePermission($permission);
        }

        return back();
    }
}
