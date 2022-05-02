<?php

namespace App\Http\Controllers\Restaurant\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\EditRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile($id){
        $restaurant = Restaurant::find($id);
        return view('backend.restaurant.home.profile',compact('restaurant'));
    }
    public function profileUpdate(EditRestaurantRequest $request, $id){

        $restaurant = Restaurant::find($id);
        $data = $request->all();
        $slug = Str::slug($request->input('name'));
        $slug_count = Restaurant::where('slug', $slug)->count();
        if ($slug_count>0){
            $slug= $slug.time();
        }
        $password = Hash::make($request->password);
        $data['password'] = $password;
        $data['slug'] = $slug;
        $status = $restaurant->fill($data)->save();
        if ($status){
            return redirect()->back()->with('success','Restaurant Profile has been updated successfully');
        }else{
            return redirect()->back()->with('errors','Something went wrong');
        }
    }
}
