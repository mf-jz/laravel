<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2018/12/26
 * Time: 16:45
 */
namespace App\Admin\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.Home.index');
    }
}
