<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{


    public function index()
    {
        $restaurant = auth('restaurant')->user()->id;
        $photos      = Photo::where('restaurant_id',$restaurant)->get();
        return view('backend.restaurant.photo.index',compact('photos'));
    }

    public function photoStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('photos')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('photos')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    public function create()
    {
        $restaurants = Restaurant::where('status','active')->get();
        return view('backend.restaurant.photo.create',compact('restaurants'));
    }

    public function store(Request $request)
    {
        $data       = $request->all();
        $status = Photo::create($data);
        if ($status){
            return redirect()->route('photo.index')->with('success','Photo created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }
    }


    public function show(Photo $menu)
    {
        //
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('backend.restaurant.photo.edit',compact('photo'));
    }


    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        if ($photo){
            $data       = $request->all();
            $status = $photo->fill($data)->save();
            if ($status){
                return redirect()->route('photo.index')->with('success','Photo has been updated successfully');
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
        $photo = Photo::find($id);
        if ($photo){
            $status = $photo->delete();
            if ($status){
                return redirect()->route('photo.index')->with('errors','Photo successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
