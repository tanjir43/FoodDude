<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function  restaurant(){
        return view('backend.restaurant.home.dashboard');
    }
}
