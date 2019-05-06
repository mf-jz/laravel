<?php

namespace App;


class AdminRole extends Model
{
    // 连接数据表
    protected $table = 'admin_roles';

    // 角色拥有所有权限
    public function permissions()
    {
        return $this->belongsToMany('App\AdminPermission', 'admin_permission_role', 'role_id', 'permission_id')
            ->withPivot(['role_id', 'permission_id']);
    }

    // 角色授予权限
    public function grantPermission($permission)
    {
        return $this->permissions()->attach($permission);
    }

    // 取消角色的权限
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    // 角色是否有权限
    public function hasPermission($permission)
    {
        return $this->permissions()->contains($permission);
    }
}
