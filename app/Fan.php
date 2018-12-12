<?php

namespace App;

use App\Model;

class Fan extends Model
{
    // 获取粉丝用户信息
    public function fUser()
    {
        $this->hasOne('App\User', 'id', 'fan_id');
    }

    // 获取关注用户信息
    public function fStar()
    {
        $this->hasOne('App\User', 'id', 'star_id');
    }
}
