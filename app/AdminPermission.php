<?php

namespace App;


class AdminPermission extends Model
{
    // 连接数据表
    protected $table = 'admin_permissions';

    // 拥有权限的所有角色
    public function roles()
    {
        return $this->belongsToMany('App\AdminRole', 'admin_permission_role', 'permission_id', 'role_id')
            ->withPivot(['permission_id', 'role_id'])->withTimestamps();;
    }
}
