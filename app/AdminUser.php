<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticated;

class AdminUser extends Authenticated
{
    protected $rememberTokenName = '';
}
