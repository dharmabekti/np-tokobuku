<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('overview');
    }
}
