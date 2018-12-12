<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $guarded = []; // 不想被批量赋值的属性的数组
//    protected $fillable = []; // 想被批量赋值的属性的数组
}
