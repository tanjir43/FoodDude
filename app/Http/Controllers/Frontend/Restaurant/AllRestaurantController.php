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
                $restaurants = Restaurant::where('status', 'active')->paginate(1);
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

    public function autoSearch(Request $request){

        $query = $request->get('term','');

        $restaurants = Restaurant::where('name','LIKE','%'.$query.'%')->get();

        $data = array();
        foreach ($restaurants as $restaurant){
            $data[] = array('value'=>$restaurant->name, 'id'=>$restaurant->id);
        }
        if (count($data)){
            return $data;
        }
        else{
            return ['value'=>'No result found.','id'=>''];
        }
    }

    public function restaurantAllSearch(Request  $request){
        $query = $request->input('query');
        $restaurants = Restaurant::where('name' , 'LIKE' , "%$query%")->orderBy('id','DESC')->paginate(8);
        return view('frontend.restaurant.all_restaurant', compact(['restaurants']));
    }

}
