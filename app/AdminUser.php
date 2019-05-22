<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticated;

class AdminUser extends Authenticated
{
    protected $rememberTokenName = '';

    protected $guarded = [];

    // 用户拥有的角色
    public function roles()
    {
        return $this->belongsToMany('App\AdminRole', 'admin_role_user', 'user_id', 'role_id')
            ->withPivot(['user_id', 'role_id']);
    }

    // 判断用户是否拥有角色
    public function isInRoles($roles)
    {
        return !!$roles->intersect($this->roles)->count();
    }

    // 用户分配角色
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    // 用户删除角色
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }

    // 用户是否拥有权限
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }
}
