<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function  admin(){
        return view('backend.admin.home.dashboard');
    }
}
