<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 个人设置页面
    public function setting()
    {
        return view('setting.setting');
    }

    // 个人设置操作
    public function settingStore()
    {
        return;
    }

    // 个人中心主页
    public function show(User $user)
    {
        // 获取个人信息，并获取关注数，粉丝数，文章数
        $user = \App\User::withCount(['stars', 'fans', 'posts'])->find($user->id);
        // 获取文章最新前十条
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
        // 获取关注的人信息 并获取关注数，粉丝数，文章数
        $star = $user->stars();
        $sUser = User::whereIn('id', $star->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();
        // 获取粉丝的信息 并获取关注数，粉丝数，文章数
        $fan = $user->fans();
        $fUser = User::whereIn('id', $fan->pluck('star_id'))->withCount(['stars', 'fans', 'posts'])->get();


        return view('user.show', compact('user', 'posts', 'sUser', 'fUser'));
    }

    // 关注
    public function fan(User $user)
    {
        $me = \Auth::user();
        $me->doFan($user->id);

        return [
            "error" => 0,
            "msg" => ""
        ];
    }

    // 取消关注
    public function unFun(User $user)
    {
        $me = \Auth::user();
        $me->doUnFan($user->id);

        return [
            "error" => 0,
            "msg" => ""
        ];
    }
}
