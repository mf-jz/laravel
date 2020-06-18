<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/13
 * Time: 16:05
 */

namespace App\Admin\Controllers;

use App\Heart;

class HeartController extends Controller
{
    public function index()
    {
        $hearts = Heart::all();

        return view('admin.heart.index', compact('hearts'));
    }

    public function create()
    {
        return view('admin.heart.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'special' => 'required|string|min:2',
            'name'    => 'required|string|min:2'
        ]);

        $result = Heart::create(request(['special', 'name', 'stars', 'cadre', 'amount', 'remarks']));

        if ($result) {
            return redirect('/admin/hearts');
        }

        return back()->withErrors('保存异常，请重试!');
    }

    public function status(Heart $heart)
    {
        $result = $heart->delete();

        if ($result) {
            return [ 'status' => 0, 'msg' => '操作成功!'];
        }

        return [ 'status' => -1, 'msg' => '系统异常，操作失败!'];

    }
}
