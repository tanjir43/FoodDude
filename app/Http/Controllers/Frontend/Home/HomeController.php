<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Photo;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $banners     = Banner::where(['status'=>'active','condition'=>'banner'])->get();
        $restaurants = Restaurant::where(['status'=>'active'])->limit(4)->get();
        return view('frontend.home.home',compact(['banners','restaurants']));
    }
    public function restaurantOwn($id, Request  $request){
        $menus      = Restaurant\Menu::where('restaurant_id',$id)->get();
        $foods      = Restaurant\Food::where('restaurant_id',$id)->get();
        $foodphotos      = Restaurant\Food::where('restaurant_id',$id)->get();
        $interiorPhotos     = Photo::where(['condition'=>'interior','status'=>'active'])->get();
        $exteriorPhotos     = Photo::where(['condition'=>'exterior','status'=>'active'])->get();
//        $tables             = Restaurant\Table::where(['status'=>'active'])->get();
        $restaurant = Restaurant::find($id);
       return view('frontend.home.restaurant_own',compact(['restaurant','menus','foods','foodphotos','interiorPhotos','exteriorPhotos',]));
    }


    public function  reservation_find($id, Request $request){

        $restaurant = Restaurant::find($id);


        $date     = $request->input('date');

        $hour     = $request->input('time');
        $guest    = $request->input('guest');

        $fhour = substr($hour, 0, 2);


//        if ($restaurant->whereDate('date','LIKE' ,"%$date%") && $restaurant->where('hour','LIKE',"%$fhour")){
//            $data = $restaurant->where('id','LIKE' ,"%$restaurant%")->with('hours');
//        }
//

        $tables      = Restaurant\Table::where('restaurant_id',$restaurant->id)->orderBy('priority','ASC')->get();
        return view('frontend.restaurant.reservation.find_table',compact(['tables','restaurant','guest']));
    }

    public function reservation_complete($id){
        $table = Restaurant\Table::find($id);


        return view('frontend.restaurant.reservation.reservation_complete',compact(['table']));



    }
}
