<?php
/**
 * Created by PhpStorm.
 * User: 97606
 * Date: 2019/2/13
 * Time: 16:05
 */

namespace App\Admin\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('admin.country.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'date_time'    => 'required|string|min:3',
            'country_name' => 'required|string|min:2',
            'person_time'  => 'required|numeric',
            'sales_amount' => 'required|numeric',
        ]);

        if ($request['cadre'] == '') {
            $request['cadre'] = ' ';
        }

        $result = Country::create(request(['date_time', 'country_name', 'cadre', 'person_time', 'sales_amount']));

        if ($result) {
            return redirect('/admin/countries');
        }

        return back()->withErrors('保存异常，请重试!');
    }

    public function status(Country $country)
    {
        $result = $country->delete();

        if ($result) {
            return [ 'status' => 0, 'msg' => '操作成功!'];
        }

        return [ 'status' => -1, 'msg' => '系统异常，操作失败!'];

    }
}
