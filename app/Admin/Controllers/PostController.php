<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/13
 * Time: 16:05
 */

namespace App\Admin\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withoutGlobalScope('status')->where('status', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    public function status(Post $post)
    {
        $this->validate(request(), [
            'status' => 'required|in:-1,1',
        ]);

        $post->status = request('status');
        $post->save();

        return [ 'status' => 0, 'msg' => '操作成功!'];
    }
}
