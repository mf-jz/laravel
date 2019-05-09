<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/12
 * Time: 11:33
 */
namespace App\Admin\Controllers;

use App\AdminUser;
use App\AdminRole;

class UserController extends Controller
{
    // 用户管理列表
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('admin/user/index', compact('users'));
    }

    // 用户添加页面
    public function add()
    {
        return view('admin/user/add');
    }

    // 用户保存
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'password' => 'required'
        ]);
        $name = request('name');
        $password = bcrypt(request('password'));

        AdminUser::create(compact('name', 'password'));

        return redirect('admin/users');
    }

    // 用户角色列表
    public function role(AdminUser $user)
    {
        $roles = AdminRole::all();
        $myRoles = $user->roles();
        return view('admin.user.role', compact('roles', 'myRoles', 'user'));
    }

    // 用户分配角色
    public function storeRole(AdminUser $user)
    {
        $this->validate(request(), [
            'roles' => 'required|array'
        ]);

        $roles = AdminRole::findMany(request('roles'));
        $myRoles = $user->roles();

        // 要增加的角色
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->assignRole($role);
        }

        // 要删除的角色
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }

        return back();
    }
}
