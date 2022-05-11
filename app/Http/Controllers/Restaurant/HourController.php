<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\CreateHourRequest;
use App\Models\Restaurant;
use App\Models\Restaurant\Hour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HourController extends Controller
{

    public function index()
    {
        $restaurant = auth('restaurant')->user()->id;

        $hours = Hour::where('restaurant_id',$restaurant)->orderBy('id','desc')->get();

        return view('backend.restaurant.reservation.hour.index',compact('hours'));
    }

    public function hourStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('hours')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('hours')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    public function create()
    {
        $restaurant = auth('restaurant')->user()->id;

        $dates      = Restaurant\Date::where('restaurant_id',$restaurant)->where('status','active')->get();
        return view('backend.restaurant.reservation.hour.create',compact('dates'));
    }


    public function store(Request $request)
    {

        $data       = $request->all();
//        $hour = date("H:i:s", strtotime($request->time));

        $status = Hour::create($data);
        if ($status){
            return redirect()->route('hour.index')->with('success','Hour created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }
    }


    public function show(Hour $hour)
    {
        //
    }


    public function edit($id)
    {
        $hour = Hour::find($id);
        $restaurant = auth('restaurant')->user()->id;

        $dates      = Restaurant\Date::where('restaurant_id',$restaurant)->where('status','active')->get();
        return view('backend.restaurant.reservation.hour.edit',compact('hour','dates'));
    }


    public function update(Request $request, $id)
    {
        $hour = Hour::find($id);
        if ($hour){
            $data       = $request->all();
            $status = $hour->fill($data)->save();
            if ($status){
                return redirect()->route('hour.index')->with('success','Hour updated successfully');
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
        $hour = Hour::find($id);
        if ($hour){
            $status = $hour->delete();
            if ($status){
                return redirect()->route('hour.index')->with('success','Hour successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
