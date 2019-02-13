<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticated;

class AdminUser extends Authenticated
{
    protected $rememberTokenName = '';

    protected $guarded = []; // 不想被批量赋值的属性的数组
}
