<?php

namespace App\Http\Controllers;

use App\Heart;
use Illuminate\Support\Facades\DB;

class HeartController extends Controller
{
    // 爱心榜单页
    public function index()
    {
        $specials = DB::table('hearts')->select(DB::raw('count(*) as num, special'))->groupBy('special')->get();

        $hearts = Heart::all();

        return view("heart.index", compact('specials', 'hearts'));
    }
}
