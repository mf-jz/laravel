<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    // 注册页面
    public function index()
    {
        return view('register.register');
    }

    // 注册行为
    public function register(Request $request)
    {
        // 验证
        $this->validate($request, [
            'name' => 'required|min:3|max:10|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:3|max:10'
        ]);
        // 逻辑
        $name = $request['name'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        User::create(compact('name', 'email', 'password'));

        // 渲染
        return redirect('/login');
    }
}
