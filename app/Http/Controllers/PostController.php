<?php

namespace App\Http\Controllers;

use App\Zan;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // 文章列表页
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->withCount(['comment', 'zan'])->paginate(6);
        return view("post.index", compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('comment');
        return view("post.show", compact('post'));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:3'
        ]);

        $user_id = \Auth::id();
        $posts = array_merge(\request(['title', 'content']), compact('user_id'));

        Post::create($posts);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view("post.edit", compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // policy策略类判断权限
        $this->authorize('update', $post);

        $this->validate($request, [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:3'
        ]);

        $post->title = $request['title'];
        $post->content = $request['content'];

        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function delete(Post $post)
    {
        // policy策略类判断权限
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('/posts');
    }

    public function imageUpload(Request $request)
    {
        $path = $request->file('filename')->storePublicly(md5(time()));
        $imageInfo = [
            "errno" => 0,
            "data" => [
                asset('storage/' . $path)
            ]
        ];

        return json_encode($imageInfo);
    }

    // 提交文章评论
    public function comment(Post $post)
    {
        $this->validate(\request(), [
            'content' => 'required|min:3',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->content = \request('content');
        $post->comment()->save($comment);

        return back();
    }

    // 赞
    public function zan(Post $post)
    {
        $zan = new Zan();
        $zan->user_id = Auth::id();
        $post->zan()->save($zan);

        return back();
    }

    // 取消赞
    public function unZan(Post $post)
    {
        $post->zanStatus(Auth::id())->delete();

        return back();
    }

    // 检索
    public function search()
    {
        $this->validate(\request(), [
            'query' => 'required',
        ]);

        $query = \request('query');
        $posts = Post::search($query)->paginate(2);

        return view("post.search", compact('query', 'posts'));
    }
}
