<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Photo;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $banners     = Banner::where(['status'=>'active','condition'=>'banner'])->get();
        $restaurants = Restaurant::where(['status'=>'active'])->limit(4)->get();
        return view('frontend.home.home',compact(['banners','restaurants']));
    }
    public function restaurantOwn($id){

        $menus      = Restaurant\Menu::where('restaurant_id',$id)->get();
        $foods      = Restaurant\Food::where('restaurant_id',$id)->get();
        $foodphotos      = Restaurant\Food::where('restaurant_id',$id)->get();
        $interiorPhotos     = Photo::where(['condition'=>'interior','status'=>'active'])->get();
        $exteriorPhotos     = Photo::where(['condition'=>'exterior','status'=>'active'])->get();

        $restaurant = Restaurant::find($id);
       return view('frontend.home.restaurant_own',compact(['restaurant','menus','foods','foodphotos','interiorPhotos','exteriorPhotos']));
    }


}
