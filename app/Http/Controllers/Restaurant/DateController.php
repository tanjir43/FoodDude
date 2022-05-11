<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    public function index()
    {
        $restaurant = auth('restaurant')->user()->id;
        $dates = Date::where('restaurant_id',$restaurant)->orderBy('id','desc')->get();
        return view('backend.restaurant.reservation.date.index',compact('dates'));
    }

    public function dateStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('dates')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('dates')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    public function create()
    {
        return view('backend.restaurant.reservation.date.create');
    }


    public function store(Request $request)
    {
        $data       = $request->all();

        $status = Date::create($data);
        if ($status){
            return redirect()->route('date.index')->with('success','Date created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }
    }


    public function show(Date $hour)
    {
        //
    }


    public function edit($id)
    {
        $date = Date::find($id);
        return view('backend.restaurant.reservation.date.edit',compact('date'));
    }


    public function update(Request $request, $id)
    {
        $date = Date::find($id);
        if ($date){
            $data       = $request->all();
            $status = $date->fill($data)->save();
            if ($status){
                return redirect()->route('date.index')->with('success','Date updated successfully');
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
        $date = Date::find($id);
        if ($date){
            $status = $date->delete();
            if ($status){
                return redirect()->route('date.index')->with('success','Date successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
