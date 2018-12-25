<?php
namespace App\Http\Controllers;

use App\Topic;
use App\Post;
use App\PostTopic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        // 获取带数量的主题信息
        $topic = Topic::withCount('postTopic')->find($topic->id);
        // 获取主题下文章列表 倒叙排列 取十条
        $posts = $topic->posts()->orderBy('created_at')->take(10)->get();
        // 获取该用户下不是该主题的文章
        $myPosts = Post::authorBy(Auth::id())->topicNotBy($topic->id)->get();

        return view("topic.show", compact('topic', 'posts', 'myPosts'));
    }

    public function submit(Topic $topic)
    {
        $this->validate(request(), [
            "post_ids" => "required|array"
        ]);

        $post_ids = request("post_ids");
        $topic_id = $topic->id;

        foreach ($post_ids as $post_id) {
            PostTopic::firstOrCreate(compact( "topic_id","post_id"));
        }

        return back();
    }
}
