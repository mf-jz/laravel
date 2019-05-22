<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticated;

class User extends Authenticated
{
    protected $fillable = ['name', 'email', 'password'];

    // 获取用户文章列表
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    // 获取关注列表
    public function stars()
    {
        return $this->hasMany('App\Fan', 'fan_id', 'id');
    }

    // 获取粉丝列表
    public function fans()
    {
        return $this->hasMany('App\Fan', 'star_id', 'id');
    }

    // 是否关注某用户
    public function hasStar($uid)
    {
        return $this->stars()->where('star_id', $uid)->count();
    }

    // 是否被某用户关注
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id', $uid)->count();
    }

    // 关注某用户
    public function doFan($uid)
    {
        $fan = new \App\Fan();
        $fan->user_id = $uid;
        return $this->stars()->save($fan);
    }

    // 取消关注某用户
    public function doUnFan($uid)
    {
        $fan = new \App\Fan();
        $fan->user_id = $uid;
        return $this->stars()->delete($fan);
    }

    // 用户拥有的通知
    public function notices()
    {
        return $this->belongsToMany('App\Notice', 'user_notice', 'user_id', 'notice_id')
            ->withPivot(['user_id', 'notice_id']);
    }

    // 用户发送通知
    public function assignNotice($notice)
    {
        return $this->notices()->attach($notice);
    }

}
