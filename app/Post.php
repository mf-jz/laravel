<?php

namespace App;

use App\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable; // scout

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

    // 反向关联用户
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // 关联评论
    public function comment()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    // 关联赞（点赞）
    public function zan()
    {
        return $this->hasMany('App\Zan')->orderBy('created_at', 'desc');
    }

    // 查询用户是否点赞
    public function zanStatus($user_id)
    {
        return $this->hasOne('App\Zan')->where('user_id', $user_id);
    }

}
