<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NoticeController extends Controller
{
    public function index()
    {
        // 获取当前用户模型
        $user = Auth::user();
        $notices = $user->notices;

        return view("notice.index", compact('notices'));
    }
}
