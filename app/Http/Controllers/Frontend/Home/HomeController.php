<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $banners     = Banner::where(['status'=>'active','condition'=>'banner'])->get();
        $restaurants = Restaurant::where(['status'=>'active'])->get();
        return view('frontend.home.home',compact(['banners','restaurants']));
    }
    public function restaurantOwn($id){
        $restaurant = Restaurant::find($id);
       return view('frontend.home.restaurant_own',compact(['restaurant']));
    }
}
