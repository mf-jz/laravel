<?php

namespace App\Http\Controllers;

use App\Country;

class CountryController extends Controller
{
    // 县区列表页
    public function index()
    {
        $countries = Country::all();
        return view("country.index", compact('countries'));
    }
}
