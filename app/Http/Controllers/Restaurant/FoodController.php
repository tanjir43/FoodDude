<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateFoodRequest;
use App\Models\Restaurant;
use App\Models\Restaurant\Food;
use App\Models\Restaurant\Menu;
use App\Models\Restaurant\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{

    public function index()
    {

        $foods= Food::orderBy('id','desc')->get();
        return view('backend.restaurant.food.index',compact('foods'));
    }

    public function foodStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('food')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('food')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }


    public function create()
    {
        $restaurant = auth('restaurant')->user()->id;

        $menus      = Menu::where('restaurant_id',$restaurant)->get();
        $verities   = Variation::where('restaurant_id',$restaurant)->get();


        return view('backend.restaurant.food.create',compact(['menus','verities']));

    }


    public function store(CreateFoodRequest $request)
    {
        $data = $request->all();
        $status = Food::create($data);
        if ($status){
            return redirect()->route('food.index')->with('success','Food created successfully');
        }else{
            return back()->with('errors','Something went wrong');
        }

    }


    public function show(Food $food)
    {
        //
    }


    public function edit($id)
    {
        $restaurant = auth('restaurant')->user()->id;
        $menus      = Menu::where('restaurant_id',$restaurant)->get();
        $verities   = Variation::where('menu_id',$restaurant)->get();
        $food       = Food::find($id);
         return  view('backend.restaurant.food.edit',compact('menus','food','verities'));
    }


    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        if ($food){
            $data       = $request->all();
            $status = $food->fill($data)->save();
            if ($status){
                return redirect()->route('food.index')->with('success','Food has been updated successfully');
            }
            else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function destroy($id)
    {
        {
            $food = Food::find($id);
            if ($food){
                $status = $food->delete();
                if ($status){
                    return redirect()->route('food.index')->with('errors','Food successfully deleted');
                }else{
                    return back('errors','Something went wrong');
                }
            }else{
                return back()->with('errors','Data not found');
            }
        }
    }
}
