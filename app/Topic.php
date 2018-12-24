<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    // 某主题下的全部文章
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_topics', 'topic_id', 'post_id');
    }

    // 某主题下的文章数(withCount)
    public function postTopic()
    {
        return $this->hasMany('App\PostTopic', 'topic_id', 'id');
    }
}
