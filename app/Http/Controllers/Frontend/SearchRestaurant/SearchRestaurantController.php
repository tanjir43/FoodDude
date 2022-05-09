<?php

namespace App\Http\Controllers\Frontend\SearchRestaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchRestaurantController extends Controller
{
    public function search(Request  $request){

    $location = $request->input('location');
    $hour     = $request->input('time');
    $guest    = $request->input('guest');
    $fhour = substr($hour, 0, 2);

        $data = DB::table('restaurants');

   if (Restaurant::where('name','LIKE' ,"%$location%") && Restaurant\Hour::where('hour','LIKE',"%$fhour")){
        $data = Restaurant::where('name','LIKE' ,"%$location%")->with('hours');
   }
        $data = $data->paginate(10);
        return view('frontend.restaurant.searched_restaurant',compact(['data']));


//        $location = DB::table('restaurants')->get();
//        $hour     = DB::table('hours')->get();
//        $guest    = DB::table('tables')->get();
//        if ($request->)

//        $hour = $request->input('time');


//        $restaurants = Restaurant::where('name','LIKE',"%$location%")->with('hours')->orderBy('id','DESC')->paginate(1);
//        $hours       = Restaurant\Hour::where('hour','LIKE',"%$fhour%")->get();

//        $restaurant   = Restaurant::where('name','LIKE','%'.$request);

//        $results = Search::addMany([
//            [Restaurant::class, 'name'],
//            [Restaurant\Hour::class, 'hour']
//        ])->paginate(1);
//        return  $results;

//       $results = Search::add(Restaurant::class, 'name')
//            ->add(Restaurant\Hour::class, 'hour')
//            ->includeModelType()
//            ->paginate()
//            ->search($request->input('name') && $request->input('hour'));

    }
}
