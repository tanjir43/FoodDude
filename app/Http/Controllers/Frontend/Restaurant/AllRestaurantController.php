<?php

namespace App\Http\Controllers\Frontend\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AllRestaurantController extends Controller
{
    public function restaurantAll(Request  $request)
    {
        $restaurants = Restaurant::query();

        if (!empty($_GET['sortBy'])){
            if ($_GET['sortBy'] == 'bookingPriceAsc') {
                $restaurants = $restaurants->where(['status' => 'active'])->orderBy('booking_price', 'Asc')->paginate(8);
            }if ($_GET['sortBy'] == 'bookingPriceDesc') {
                $restaurants = $restaurants->where(['status' => 'active'])->orderBy('booking_price','DESC')->paginate(8);
            }if ($_GET['sortBy'] == 'titleAsc') {
                $restaurants = $restaurants->where(['status' => 'active'])->orderBy('name','Asc')->paginate(8);
            }if ($_GET['sortBy'] == 'titleDesc') {
                $restaurants = $restaurants->where(['status' => 'active'])->orderBy('name','DESC')->paginate(8);
            }
            }else {
                $restaurants = Restaurant::where('status', 'active')->paginate(8);
            }
            return view('frontend.restaurant.all_restaurant', compact(['restaurants']));
    }

    public function  restaurantFilter(Request $request){
        $data = $request->all();

        $sortByUrl = "";

       if (!empty($data['sortBy'])){
           $sortByUrl .= '&sortBy='.$data['sortBy'];
       }
       return redirect()->route('restaurant.all',$sortByUrl);
    }
}
