<?php

namespace App\Http\Controllers;

use App\Heart;
use Illuminate\Support\Facades\DB;

class HeartController extends Controller
{
    // 爱心榜单页
    public function index()
    {
        $specials = DB::table('hearts')->select('special')->distinct()->get();

        $name = DB::table('hearts')->select('name')->distinct()->get();

        $hearts = Heart::orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view("heart.index", compact('specials', 'hearts', 'name'));
    }
}
