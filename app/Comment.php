<?php

namespace App;


class Comment extends Model
{
    // 反向关联文章
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    // 反向关联用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
